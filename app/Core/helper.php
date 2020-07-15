<?php

function availableTimezoneValues() {
    return [
        '-11:00',
        '-10:00',
        '-09:30',
        '-09:00',
        '-08:00',
        '-07:00',
        '-06:00',
        '-05:00',
        '-04:30',
        '-04:00',
        '-03:30',
        '-03:00',
        '-02:00',
        '-01:00',
        '+00:00',
        '+01:00',
        '+02:00',
        '+03:00',
        '+04:00',
        '+04:30',
        '+05:00',
        '+05:30',
        '+05:45',
        '+06:00',
        '+06:30',
        '+07:00',
        '+08:00',
        '+08:45',
        '+09:00',
        '+09:30',
        '+10:00',
        '+10:30',
        '+11:00',
        '+11:30',
        '+12:00',
        '+12:45',
        '+13:00',
        '+14:00',
    ];
}

function getTimezoneName($offset) {
    switch($offset) {
        case '-11:00' : return 'Pacific/Midway'; break;
        case '-10:00' : return 'Pacific/Honolulu'; break;
        case '-09:30' : return 'Pacific/Marquesas'; break;
        case '-09:00' : return 'Pacific/Gambier'; break;
        case '-08:00' : return 'America/Dawson'; break;
        case '-07:00' : return 'America/Boise'; break;
        case '-06:00' : return 'America/Belize'; break;
        case '-05:00' : return 'America/Atikokan'; break;
        case '-04:30' : return 'America/Caracas'; break;
        case '-04:00' : return 'America/Anguilla'; break;
        case '-03:30' : return 'Canada/Newfoundland'; break;
        case '-03:00' : return 'America/Araguaina'; break;
        case '-02:00' : return 'America/Noronha'; break;
        case '-01:00' : return 'Atlantic/Azores'; break;
        case '+00:00' : return 'Africa/Abidjan'; break;
        case '+01:00' : return 'Africa/Algiers'; break;
        case '+02:00' : return 'Europe/Kiev'; break;
        case '+03:00' : return 'Asia/Amman'; break;
        case '+04:00' : return 'Asia/Baku'; break;
        case '+04:30' : return 'Asia/Kabul'; break;
        case '+05:00' : return 'Asia/Aqtau'; break;
        case '+05:30' : return 'Asia/Kolkata'; break;
        case '+05:45' : return 'Asia/Kathmandu'; break;
        case '+06:00' : return 'Asia/Almaty'; break;
        case '+06:30' : return 'Asia/Rangoon'; break;
        case '+07:00' : return 'Asia/Bangkok'; break;
        case '+08:00' : return 'Asia/Brunei'; break;
        case '+08:45' : return 'Australia/Eucla'; break;
        case '+09:00' : return 'Asia/Irkutsk'; break;
        case '+09:30' : return 'Australia/Darwin'; break;
        case '+10:00' : return 'Australia/Brisbane'; break;
        case '+10:30' : return 'Australia/Lord_Howe'; break;
        case '+11:00' : return 'Antarctica/Macquarie'; break;
        case '+11:30' : return 'Pacific/Norfolk'; break;
        case '+12:00' : return 'Asia/Magadan'; break;
        case '+12:45' : return 'Pacific/Chatham'; break;
        case '+13:00' : return 'Pacific/Apia'; break;
        case '+14:00' : return 'Pacific/Kiritimati'; break;
    }
}

function formatSizeUnits($bytes) {
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' Gb';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' Mb';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' Kb';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' b';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' b';
    } else {
        $bytes = '0 b';
    }
    return $bytes;
}
