# Calculator Plugin Code Snippets

## Postal Code Validation

```php
/**
 * Validate German postal code
 *
 * @param string $postal_code Postal code to validate
 * @return true|WP_Error
 */
function palmo_validate_postal_code( $postal_code ) {
    // German postal codes: 5 digits, range 01000-99999
    if ( ! preg_match( '/^[0-9]{5}$/', $postal_code ) ) {
        return new WP_Error(
            'invalid_format',
            __( 'Ungültige Postleitzahl. Format: 5 Ziffern (z.B. 10115)', 'palmo-calculator' )
        );
    }

    $postal_int = intval( $postal_code );

    if ( $postal_int < 1000 || $postal_int > 99999 ) {
        return new WP_Error(
            'out_of_range',
            __( 'Postleitzahl außerhalb des gültigen Bereichs (01000-99999)', 'palmo-calculator' )
        );
    }

    return true;
}
```

## Weight Validation

```php
/**
 * Validate weight input
 *
 * @param float $weight Weight in kg
 * @return true|WP_Error
 */
function palmo_validate_weight( $weight ) {
    $weight = floatval( $weight );

    if ( $weight < 1 ) {
        return new WP_Error(
            'weight_too_low',
            __( 'Mindestgewicht: 1 kg', 'palmo-calculator' )
        );
    }

    if ( $weight > 10000 ) {
        return new WP_Error(
            'weight_too_high',
            __( 'Maximales Gewicht: 10.000 kg', 'palmo-calculator' )
        );
    }

    return true;
}
```

## Distance Calculation (Simple)

```php
/**
 * Calculate distance between postal codes (simplified)
 *
 * @param string $from Origin postal code
 * @param string $to   Destination postal code
 * @return int Distance in km
 */
function palmo_calculate_distance_simple( $from, $to ) {
    // Simplified calculation based on postal code regions
    // In production, use Google Maps Distance Matrix API

    $from_region = substr( $from, 0, 2 );
    $to_region   = substr( $to, 0, 2 );

    // Approximate km per postal region difference
    $region_diff = abs( intval( $from_region ) - intval( $to_region ) );
    $distance    = $region_diff * 50; // ~50km per region

    // Add intra-region distance
    $from_sub = substr( $from, 2, 3 );
    $to_sub   = substr( $to, 2, 3 );
    $sub_diff = abs( intval( $from_sub ) - intval( $to_sub ) );
    $distance += $sub_diff / 20; // Fine-tune distance

    return max( 1, round( $distance ) ); // Minimum 1km
}
```

## Distance Calculation (Google Maps API)

```php
/**
 * Calculate distance using Google Maps Distance Matrix API
 *
 * @param string $from Origin postal code
 * @param string $to   Destination postal code
 * @return int|WP_Error Distance in km or error
 */
function palmo_calculate_distance_google( $from, $to ) {
    $api_key = get_option( 'palmo_google_api_key' );

    if ( empty( $api_key ) ) {
        return new WP_Error( 'no_api_key', __( 'Google API Key nicht konfiguriert', 'palmo-calculator' ) );
    }

    $url = add_query_arg( array(
        'origins'      => $from . ',Germany',
        'destinations' => $to . ',Germany',
        'key'          => $api_key,
    ), 'https://maps.googleapis.com/maps/api/distancematrix/json' );

    $response = wp_remote_get( $url, array( 'timeout' => 10 ) );

    if ( is_wp_error( $response ) ) {
        return $response;
    }

    $body = wp_remote_retrieve_body( $response );
    $data = json_decode( $body, true );

    if ( empty( $data['rows'][0]['elements'][0]['distance']['value'] ) ) {
        return new WP_Error( 'api_error', __( 'Entfernung konnte nicht berechnet werden', 'palmo-calculator' ) );
    }

    // Distance in meters, convert to km
    $distance_km = round( $data['rows'][0]['elements'][0]['distance']['value'] / 1000 );

    return $distance_km;
}
```

## Price Calculation

```php
/**
 * Calculate shipping price
 *
 * @param array $params Calculation parameters
 * @return float Calculated price in EUR
 */
function palmo_calculate_price( $params ) {
    $distance = absint( $params['distance'] ?? 0 );
    $weight   = floatval( $params['weight'] ?? 0 );
    $urgency  = sanitize_text_field( $params['urgency'] ?? 'normal' );

    // Base rate: €0.50 per km
    $base_price = $distance * 0.50;

    // Weight surcharge (over 100kg)
    $weight_surcharge = 0;
    if ( $weight > 100 ) {
        $weight_surcharge = ( $weight - 100 ) * 0.10; // €0.10 per kg
    }

    // Urgency multiplier
    $urgency_multiplier = 1.0;
    if ( 'express' === $urgency ) {
        $urgency_multiplier = 1.5; // +50% for express
    }

    // Calculate total
    $total = ( $base_price + $weight_surcharge ) * $urgency_multiplier;

    // Minimum charge
    $total = max( $total, 25.00 );

    return round( $total, 2 );
}
```

## Volumetric Weight Calculation

```php
/**
 * Calculate volumetric weight
 *
 * @param float $length Length in cm
 * @param float $width  Width in cm
 * @param float $height Height in cm
 * @return float Volumetric weight in kg
 */
function palmo_calculate_volumetric_weight( $length, $width, $height ) {
    // Formula: (L × W × H) / 5000
    $volume             = $length * $width * $height;
    $volumetric_weight = $volume / 5000;

    return round( $volumetric_weight, 2 );
}

/**
 * Get billable weight (higher of actual vs volumetric)
 *
 * @param float $actual_weight    Actual weight in kg
 * @param float $length           Length in cm
 * @param float $width            Width in cm
 * @param float $height           Height in cm
 * @return float Billable weight in kg
 */
function palmo_get_billable_weight( $actual_weight, $length, $width, $height ) {
    $volumetric_weight = palmo_calculate_volumetric_weight( $length, $width, $height );

    return max( $actual_weight, $volumetric_weight );
}
```

## AJAX Form Handler

```php
/**
 * AJAX handler for calculator
 */
function palmo_ajax_calculate() {
    // Verify nonce
    check_ajax_referer( 'palmo-calculator-nonce', 'nonce' );

    // Get inputs
    $from_postal = isset( $_POST['from_postal'] ) ? sanitize_text_field( $_POST['from_postal'] ) : '';
    $to_postal   = isset( $_POST['to_postal'] ) ? sanitize_text_field( $_POST['to_postal'] ) : '';
    $weight      = isset( $_POST['weight'] ) ? floatval( $_POST['weight'] ) : 0;
    $urgency     = isset( $_POST['urgency'] ) ? sanitize_text_field( $_POST['urgency'] ) : 'normal';

    // Validate postal codes
    $from_valid = palmo_validate_postal_code( $from_postal );
    if ( is_wp_error( $from_valid ) ) {
        wp_send_json_error( array( 'message' => $from_valid->get_error_message() ) );
    }

    $to_valid = palmo_validate_postal_code( $to_postal );
    if ( is_wp_error( $to_valid ) ) {
        wp_send_json_error( array( 'message' => $to_valid->get_error_message() ) );
    }

    // Validate weight
    $weight_valid = palmo_validate_weight( $weight );
    if ( is_wp_error( $weight_valid ) ) {
        wp_send_json_error( array( 'message' => $weight_valid->get_error_message() ) );
    }

    // Calculate distance
    $distance = palmo_calculate_distance_simple( $from_postal, $to_postal );

    // Calculate price
    $price = palmo_calculate_price( array(
        'distance' => $distance,
        'weight'   => $weight,
        'urgency'  => $urgency,
    ) );

    // Return success
    wp_send_json_success( array(
        'distance' => $distance,
        'price'    => number_format( $price, 2, ',', '.' ),
        'currency' => '€',
    ) );
}
add_action( 'wp_ajax_palmo_calculate', 'palmo_ajax_calculate' );
add_action( 'wp_ajax_nopriv_palmo_calculate', 'palmo_ajax_calculate' );
```

## Frontend JavaScript

```javascript
(function($) {
    'use strict';

    $(document).ready(function() {
        const $form = $('#palmo-calculator-form');
        const $result = $('#palmo-calculator-result');
        const $error = $('#palmo-calculator-error');

        $form.on('submit', function(e) {
            e.preventDefault();

            // Hide previous results
            $result.hide();
            $error.hide();

            // Disable submit button
            const $button = $form.find('button[type="submit"]');
            const originalText = $button.text();
            $button.prop('disabled', true).text('Berechnung läuft...');

            // Collect data
            const formData = {
                action: 'palmo_calculate',
                nonce: palmoCalc.nonce,
                from_postal: $('#from_postal').val(),
                to_postal: $('#to_postal').val(),
                weight: $('#weight').val(),
                urgency: $('#urgency').val() || 'normal'
            };

            // Send AJAX
            $.post(palmoCalc.ajaxurl, formData)
                .done(function(response) {
                    if (response.success) {
                        $('#result-distance').text(response.data.distance);
                        $('#result-price').text(response.data.price + ' ' + response.data.currency);
                        $result.fadeIn();
                    } else {
                        $error.text(response.data.message).fadeIn();
                    }
                })
                .fail(function() {
                    $error.text('Fehler bei der Berechnung').fadeIn();
                })
                .always(function() {
                    $button.prop('disabled', false).text(originalText);
                });
        });

        // Real-time postal code validation
        $('#from_postal, #to_postal').on('input', function() {
            const $input = $(this);
            const value = $input.val();

            if (value.length === 5 && /^[0-9]{5}$/.test(value)) {
                $input.removeClass('invalid').addClass('valid');
            } else if (value.length > 0) {
                $input.removeClass('valid').addClass('invalid');
            } else {
                $input.removeClass('valid invalid');
            }
        });
    });

})(jQuery);
```

## Caching Implementation

```php
/**
 * Calculate distance with caching
 *
 * @param string $from Origin postal code
 * @param string $to   Destination postal code
 * @return int Distance in km
 */
function palmo_calculate_distance_cached( $from, $to ) {
    // Create cache key
    $cache_key = "palmo_distance_{$from}_{$to}";

    // Try to get from cache
    $distance = get_transient( $cache_key );

    if ( false !== $distance ) {
        return absint( $distance );
    }

    // Calculate distance
    $distance = palmo_calculate_distance_google( $from, $to );

    if ( is_wp_error( $distance ) ) {
        return $distance;
    }

    // Cache for 30 days
    set_transient( $cache_key, $distance, 30 * DAY_IN_SECONDS );

    return absint( $distance );
}
```

---

## Version

**Document Version:** 1.0.0
**Last Updated:** 2026-01-22
