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
    // Clean and normalize
    $phoneNumber = trim($phoneNumber);
    $phoneNumber = preg_replace('/[^\d+]/', '', $phoneNumber);

    // Convert starting 00 to +
    if (strpos($phoneNumber, '00') === 0) {
        $phoneNumber = '+' . substr($phoneNumber, 2);
    }

    // Normalize to digits only
    if (strpos($phoneNumber, '+') === 0) {
        $digits = substr($phoneNumber, 1);
    } elseif (strlen($phoneNumber) === 11 && $phoneNumber[0] === '0') {
        // Nigerian local number with leading 0
        $digits = '234' . substr($phoneNumber, 1);
    } elseif (strlen($phoneNumber) === 10) {
        // Nigerian local number without leading 0
        $digits = '234' . $phoneNumber;
    } else {
        // Assume it's already international without '+'
        $digits = $phoneNumber;
    }

    // Detect country code
    $countryCode = '';
    $nationalNumber = '';

    if (preg_match('/^1(\d{10})$/', $digits, $matches)) {
        // US/Canada
        $countryCode = '1';
        $nationalNumber = $matches[1];
    } elseif (preg_match('/^44(\d{10})$/', $digits, $matches)) {
        // UK
        $countryCode = '44';
        $nationalNumber = $matches[1];
    } elseif (preg_match('/^234(\d{10})$/', $digits, $matches)) {
        // Nigeria
        $countryCode = '234';
        $nationalNumber = $matches[1];
    } else {
        // Fallback
        $countryCode = substr($digits, 0, strlen($digits) - 10);
        $nationalNumber = substr($digits, -10);
    }

    // Format number as +CC (XXX) XXX-XXXX
    $firstThree = substr($nationalNumber, 0, 3);
    $nextThree = substr($nationalNumber, 3, 3);
    $lastFour = substr($nationalNumber, 6, 4);

    return '+' . $countryCode . ' (' . $firstThree . ') ' . $nextThree . '-' . $lastFour;
}
function getFile($file, $fallback = null)
{
    return $file ? asset('storage/' . $file) : asset("gum/images/$fallback");
}
