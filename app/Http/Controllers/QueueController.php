<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\ReadData;
use App\Exceptions\WriteData;
use Illuminate\Support\Facades\Redirect;

class QueueController extends Controller
{
	public function queueRoom()
	{
		$Patients = ReadData::QueueRoomData();
		$Doctors = ReadData::DoctorsRoomData();
		return view('QueueRoom', [
			'Patients' => $Patients,
			'Doctors' => $Doctors,
		]);
	}

	public function popPatient()
	{
		$Patients = ReadData::QueueRoomData();
		$Doctors = ReadData::DoctorsRoomData();
		foreach ($Patients as $Patient) {
			$PatientSpecialist = json_decode($Patient['disease'])->specialist;
			foreach ($Doctors as $Doctor) {
				if ($Doctor['specialist'] == $PatientSpecialist && count($Doctor['queue']) < $Doctor['slot']) {
					array_push($Doctors[array_search($Doctor, $Doctors)]['queue'], $Patient);
					unset($Patients[array_search($Patient, $Patients)]);
					break;
				}
			}
		}
		WriteData::DoctorsRoomData($Doctors);
		WriteData::QueueRoomData($Patients);
		return Redirect::to('/queue-room')->with('success', 'Patient has been moved to the doctor room');
	}

	public function removePatient($PatientPhysId)
	{
		$PatientsInQueue = ReadData::QueueRoomData();
		foreach ($PatientsInQueue as $Patient) {
			if ($Patient['PhysId'] == $PatientPhysId) {
				unset($PatientsInQueue[array_search($Patient, $PatientsInQueue)]);
				break;
			}
		}
		WriteData::QueueRoomData($PatientsInQueue);
		return Redirect::to('/queue-room')->with('success', 'Patient has been removed from the queue room');
	}
}
