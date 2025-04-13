<?php

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

function gs($key = null)
{
    if (Schema::hasTable('general_settings')) {
        $general = Cache::get('GeneralSetting');
        if (!$general) {
            $general = GeneralSetting::first();
            Cache::put('GeneralSetting', $general);
        }
        if ($key) {
            return @$general->$key;
        }

        return $general;
    }
    return null;
}

function logo()
{
    if (Schema::hasTable('general_settings')) {
        return gs('logo') ? env('APP_URL') . '/storage/' . gs('dark_logo') : asset('gum/images/logo.png');
    }

    return asset('gum/images/logo.png');
}
function lightLogo()
{
    if (Schema::hasTable('general_settings')) {
        return gs('logo') ? env('APP_URL') . '/storage/' . gs('light_logo') : asset('gum/images/logo.png');
    }

    return asset('gum/images/logo.png');
}
function favicon()
{
    if (Schema::hasTable('general_settings')) {
        return gs('favicon') ? env('APP_URL') . '/storage/' . gs('favicon') : asset('gum/images/favicon.png');
    }

    return asset('gum/images/favicon.png');
}
function formatPhoneNumber($phoneNumber)
{
    // Trim and clean input
    $phoneNumber = trim($phoneNumber);
    $phoneNumber = preg_replace('/[^\d+]/', '', $phoneNumber);

    // Convert starting 00 to +
    if (strpos($phoneNumber, '00') === 0) {
        $phoneNumber = '+' . substr($phoneNumber, 2);
    }

    // If already starts with +, assume international
    if (strpos($phoneNumber, '+') === 0) {
        $digits = substr($phoneNumber, 1);
    } elseif (strlen($phoneNumber) === 11 && $phoneNumber[0] === '0') {
        // Nigerian local with leading 0
        $digits = '234' . substr($phoneNumber, 1);
    } elseif (strlen($phoneNumber) === 10) {
        // Nigerian local without leading 0
        $digits = '234' . $phoneNumber;
    } else {
        // Fallback for other international numbers (assume valid)
        $digits = $phoneNumber;
    }

    // Break into pieces: assume 3-digit prefix, then next 3, then 4
    $countryCode = '';
    $rest = $digits;

    // Extract country code (e.g. 234, 44, 1, etc.)
    if (strlen($digits) > 10) {
        $countryCode = substr($digits, 0, strlen($digits) - 10);
        $rest = substr($digits, -10);
    }

    $firstThree = substr($rest, 0, 3);
    $nextThree = substr($rest, 3, 3);
    $lastFour = substr($rest, 6, 4);

    return '+' . $countryCode . ' (' . $firstThree . ') ' . $nextThree . '-' . $lastFour;
}
function getFile($file, $fallback = null)
{
    return $file ? asset('storage/' . $file) : asset("gum/images/$fallback");
}
