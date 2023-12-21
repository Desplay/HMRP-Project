<?php

namespace App\Exceptions;

class WriteData
{
    public static function CountPatientData($data)
    {
        $app_path = app_path('Models\Data\CountPatient.json');
        file_put_contents($app_path, json_encode($data));
    }
    public static function LobbyData($data)
    {
        $app_path = app_path('Models\Data\Lobby.json');
        file_put_contents($app_path, json_encode($data));
    }
    public static function QueueRoomData($data)
    {
        $app_path = app_path('Models\Data\QueueRoom.json');
        file_put_contents($app_path, json_encode($data));
    }
    public static function DoctorsRoomData($data)
    {
        $app_path = app_path('Models\Data\Doctors Room.json');
        file_put_contents($app_path, json_encode($data));
    }
}
