<?php

class SettingsController extends Controller
{
    protected $settings;

    public function __construct()
    {
        parent::__construct();
    }

    public function edit()
    {
        // !preg_match('/^(\\+|-)([0-1][0-9]):([0|3|4][0])$/', $_POST['value'])

        if (!isset($_POST['value']) || empty($_POST['value'])) {

            $data['message'] = 'The current time zone value cannot be empty';

            header("HTTP/1.0 422 Unprocessable Entity");

        } elseif (!in_array($_POST['value'], availableTimezoneValues())) {

            $data['message'] = 'Please input correct timezone value in UTC format (+/-00:00)';

            header("HTTP/1.0 422 Unprocessable Entity");

        } else {

            $timeZoneName = getTimezoneName($_POST['value']);

            $this->settings->update(['value' => $_POST['value']], ['name' => 'timezone']);

            $data['message'] = 'Timezone updated successfully: ' . $timeZoneName;
        }

        header('Content-Type: application/json');

        echo json_encode($data);
    }
}
