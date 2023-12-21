<?php

namespace App\Exceptions;

class ReadData
{

    public static function CountPatientData()
    {
        $app_path = app_path('Models\Data\CountPatient.json');
        return json_decode(file_get_contents($app_path), true);
    }
    public static function DoctorData()
    {
        $app_path = app_path('Models\Data\Doctors.json');
        return json_decode(file_get_contents($app_path), true);
    }
    public static function genderData()
    {
        $app_path = app_path('Models\Data\Genders.json');
        return json_decode(file_get_contents($app_path), true);
    }
    public static function diseaseData()
    {
        $app_path = app_path('Models\Data\Kind of diseases.json');
        return json_decode(file_get_contents($app_path), true);
    }
    public static function LobbyData()
    {
        $app_path = app_path('Models\Data\Lobby.json');
        return json_decode(file_get_contents($app_path), true);
    }
    public static function QueueRoomData()
    {
        $app_path = app_path('Models\Data\QueueRoom.json');
        return json_decode(file_get_contents($app_path), true);
    }
    public static function DoctorsRoomData()
    {
        $app_path = app_path('Models\Data\Doctors Room.json');
        $DoctorsRoom = json_decode(file_get_contents($app_path), true);
        if (count($DoctorsRoom) == 0) {
            $Doctors = self::DoctorData();
            foreach ($Doctors as $Doctor) {
                $Doctor['queue'] = [];
                $DoctorsRoom[] = $Doctor;
            }
            WriteData::DoctorsRoomData($DoctorsRoom);
        }
        return $DoctorsRoom;
    }
}
