<?php
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
class Helper
{
    public static function print_date($array_data)
    {
        $date_string = "";
        if ($array_data['nta_sunday'] == 'checked') {
            $date_string .= 'Sunday';
        }

        if ($array_data['nta_monday'] == 'checked') {
            $date_string .= ', Monday';
        }

        if ($array_data['nta_tuesday'] == 'checked') {
            $date_string .= ', Tuesday';
        }

        if ($array_data['nta_wednesday'] == 'checked') {
            $date_string .= ', Wednesday';
        }

        if ($array_data['nta_thursday'] == 'checked') {
            $date_string .= ', Thursday';
        }

        if ($array_data['nta_friday'] == 'checked') {
            $date_string .= ', Friday';
        }

        if ($array_data['nta_saturday'] == 'checked') {
            $date_string .= ', Saturday';
        }

        $date_string = trim($date_string, ',');
        return $date_string;
    }

    public static function getValueOrDefault($object, $objectKey, $defaultValue = '')
    {
        return (isset($object[$objectKey]) ? $object[$objectKey] : $defaultValue);
    }

    public static function get_times($default = '08:00', $interval = '+30 minutes')
    {

        $output = '';

        $current = strtotime('00:00');
        $end = strtotime('23:59');

        while ($current <= $end) {
            $time = date('H:i', $current);
            $sel = ($time == $default) ? ' selected' : '';

            $output .= "<option value=\"{$time}\"{$sel}>" . date('H:i', $current) . '</option>';
            $current = strtotime($interval, $current);
        }

        return $output;
    }

    public static function sanitize_array( $input ) {
        // Initialize the new array that will hold the sanitize values
        $new_input = array();
        // Loop through the input and sanitize each of the values
        foreach ( $input as $key => $val ) {
            $new_input[ $key ] = ( isset( $input[ $key ] ) ) ? sanitize_text_field( $val ) : '';
        }
        return $new_input;
    }

    public static function get_back_time($account_info)
    {
        // IF CHECKED ALWAYS AVAILABLE
        if (isset($account_info['nta_button_available']) && $account_info['nta_button_available'] == 'ON' )
        {
            return 'online';
        }
            

        // $todayDayOfWeek = current_time('l');
        // $timeNow = current_time('H:i');
        // $timeNow = new DateTime($timeNow);
        $todayDayOfWeek = date("l", strtotime(current_time('mysql')));
		$timeNow = new DateTime(current_time('mysql'));
       
        switch ($todayDayOfWeek) {
            case 'Monday':
                $getTimeWorking = explode("-", $account_info['nta_monday_working']);

                $start = new DateTime($getTimeWorking[0]);
                $end = new DateTime($getTimeWorking[1]);

                if ($account_info['nta_monday'] == 'checked') {
                    $hours = $start->diff($timeNow);
                    if ($timeNow >= $start && $timeNow <= $end) {
                        return 'online';
                    } else if ($timeNow < $start) {
                        return $hours->format("%h:%i");
                    }
                }
                return 'offline';
                break;
            case 'Tuesday':
                $getTimeWorking = explode("-", $account_info['nta_tuesday_working']);

                $start = new DateTime($getTimeWorking[0]);
                $end = new DateTime($getTimeWorking[1]);

                if ($account_info['nta_tuesday'] == 'checked') {
                    $hours = $start->diff($timeNow);
                    if ($timeNow >= $start && $timeNow <= $end) {
                        return 'online';
                    } else if ($timeNow < $start) {
                        return $hours->format("%h:%i");
                    }
                }
                return 'offline';
                break;
            case 'Wednesday':
                $getTimeWorking = explode("-", $account_info['nta_wednesday_working']);

                $start = new DateTime($getTimeWorking[0]);
                $end = new DateTime($getTimeWorking[1]);

                if ($account_info['nta_wednesday'] == 'checked') {
                    $hours = $start->diff($timeNow);
                    if ($timeNow >= $start && $timeNow <= $end) {
                        return 'online';
                    } else if ($timeNow < $start) {
                        return $hours->format("%h:%i");
                    }
                }
                return 'offline';
                break;
            case 'Thursday':
                $getTimeWorking = explode("-", $account_info['nta_thursday_working']);

                $start = new DateTime($getTimeWorking[0]);
                $end = new DateTime($getTimeWorking[1]);

                if ($account_info['nta_thursday'] == 'checked') {
                    $hours = $start->diff($timeNow);
                    if ($timeNow >= $start && $timeNow <= $end) {
                        return 'online';
                    } else if ($timeNow < $start) {
                        return $hours->format("%h:%i");
                    }
                }
                return 'offline';
                break;
            case 'Friday':
                $getTimeWorking = explode("-", $account_info['nta_friday_working']);

                $start = new DateTime($getTimeWorking[0]);
                $end = new DateTime($getTimeWorking[1]);

                if ($account_info['nta_friday'] == 'checked') {
                    $hours = $start->diff($timeNow);
                    if ($timeNow >= $start && $timeNow <= $end) {
                        return 'online';
                    } else if ($timeNow < $start) {
                        return $hours->format("%h:%i");
                    }
                }
                return 'offline';
                break;
            case 'Saturday':
                $getTimeWorking = explode("-", $account_info['nta_saturday_working']);

                $start = new DateTime($getTimeWorking[0]);
                $end = new DateTime($getTimeWorking[1]);

                if ($account_info['nta_saturday'] == 'checked') {
                    $hours = $start->diff($timeNow);
                    if ($timeNow >= $start && $timeNow <= $end) {
                        return 'online';
                    } else if ($timeNow < $start) {
                        return $hours->format("%h:%i");
                    }
                }
                return 'offline';
                break;
            case 'Sunday':
                $getTimeWorking = explode("-", $account_info['nta_sunday_working']);

                $start = new DateTime($getTimeWorking[0]);
                $end = new DateTime($getTimeWorking[1]);

                if ($account_info['nta_sunday'] == 'checked') {
                    $hours = $start->diff($timeNow);
                    if ($timeNow >= $start && $timeNow <= $end) {
                        return 'online';
                    } else if ($timeNow < $start) {
                        return $hours->format("%h:%i");
                    }
                }
                return 'offline';
                break;
            default:
                return 'offline';
        }
    }
}
