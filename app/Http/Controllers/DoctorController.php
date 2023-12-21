<?php

namespace App\Http\Controllers;

use App\Exceptions\ReadData;
use App\Exceptions\WriteData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DoctorController extends Controller
{
    public function doctorRoom($DoctorId)
    {
        $Doctors = ReadData::DoctorsRoomData();
        $Doctor = $Doctors[array_search($DoctorId, array_column($Doctors, 'ID'))];

        return view('doctorRoom', [
            'Doctor' => $Doctor,
        ]);
    }

    public function popPatient($DoctorId)
    {
        $Doctors = ReadData::DoctorsRoomData();
        $Patients = ReadData::QueueRoomData();
        $Doctor = $Doctors[array_search($DoctorId, array_column($Doctors, 'ID'))];
        array_pop($Doctor['queue']);
        foreach ($Patients as $Patient) {
            $PatientSpecialist = json_decode($Patient['disease'])->specialist;
            if ($Doctor['specialist'] == $PatientSpecialist && count($Doctor['queue']) < $Doctor['slot']) {
                array_push($Doctor['queue'], $Patient);
                unset($Patients[array_search($Patient, $Patients)]);
                break;
            }
        }
        $Doctors[array_search($DoctorId, array_column($Doctors, 'ID'))] = $Doctor;
        WriteData::DoctorsRoomData($Doctors);
        WriteData::QueueRoomData($Patients);
        return Redirect::to('/doctor-room/' . $Doctor['ID'])->with('success', 'Patient has been removed from the doctor room');
    }

    public function removePatient($DoctorId, $PatientPhysId) {
        $Doctors = ReadData::DoctorsRoomData();
        $Patients = ReadData::QueueRoomData();
        $Doctor = $Doctors[array_search($DoctorId, array_column($Doctors, 'ID'))];
        foreach ($Doctor['queue'] as $Patient) {
            if ($Patient['PhysId'] == $PatientPhysId) {
                unset($Doctor['queue'][array_search($Patient, $Doctor['queue'])]);
                break;
            }
        }
        foreach ($Patients as $Patient) {
            $PatientSpecialist = json_decode($Patient['disease'])->specialist;
            if ($Doctor['specialist'] == $PatientSpecialist && count($Doctor['queue']) < $Doctor['slot']) {
                array_push($Doctor['queue'], $Patient);
                unset($Patients[array_search($Patient, $Patients)]);
                break;
            }
        }
        $Doctors[array_search($DoctorId, array_column($Doctors, 'ID'))] = $Doctor;
        WriteData::DoctorsRoomData($Doctors);
        WriteData::QueueRoomData($Patients);
        return Redirect::to('/doctor-room/' . $Doctor['ID'])->with('success', 'Patient has been removed from the doctor room');
    }
}
