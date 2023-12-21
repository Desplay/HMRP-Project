<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\ReadData;
use App\Exceptions\WriteData;
use Illuminate\Support\Facades\Redirect;

class LobbyController extends Controller
{
	public function lobby()
	{
		$Genders = ReadData::genderData();
		$Diseases = ReadData::diseaseData();
		$Patients = ReadData::LobbyData();
		return view('lobby', [
			'Genders' => $Genders,
			'Diseases' => $Diseases,
			'Patients' => $Patients,
		]);
	}

	public function addPatient(Request $request)
	{
		$Patients = ReadData::LobbyData();
		$Count = ReadData::CountPatientData();
		$PhysId = "BN" . str_pad($Count + 1, 3, '0', STR_PAD_LEFT);
		$name = $request->input('name');
		$age = $request->input('age');
		$gender = $request->input('gender');
		$disease = $request->input('disease');
		$message = $request->input('message');
		$created_at = date('H:i d-m-Y');
		array_push($Patients, [
			"PhysId" => $PhysId,
			"name" => $name,
			"age" => $age,
			"gender" => $gender,
			"disease" => $disease,
			"message" => $message,
			"created_at" => $created_at,
		]);
		usort($Patients, function ($a, $b) {
			return json_decode($a['disease'])->prioritized <=> json_decode($b['disease'])->prioritized;
		});
		WriteData::LobbyData($Patients);
		WriteData::CountPatientData($Count);
		return Redirect::to('/lobby')->with('success', 'Patient added successfully');
	}
	public function popPatient()
	{
		$PatientsInLobby = ReadData::LobbyData();
		$PatientInQueue = ReadData::QueueRoomData();
		array_push($PatientInQueue, array_shift($PatientsInLobby));
		WriteData::LobbyData($PatientsInLobby);
		WriteData::QueueRoomData($PatientInQueue);
		return Redirect::to('/lobby')->with('success', 'Patient poped successfully');
	}

	public function removePatient($PatientPhysID)
	{
		$PatientsInLobby = ReadData::LobbyData();
		foreach ($PatientsInLobby as $Patient) {
			if ($Patient['PhysId'] == $PatientPhysID) {
				unset($PatientsInLobby[array_search($Patient, $PatientsInLobby)]);
				break;
			}
		}
		WriteData::LobbyData($PatientsInLobby);
		return Redirect::to('/lobby')->with('success', 'Patient removed successfully');
	}

	public function editPatient($PatientPhysID)
	{
		$Patients = ReadData::LobbyData();
		$PatientFound = null;
		foreach ($Patients as $Patient) {
			if ($Patient['PhysId'] == $PatientPhysID) {
				$PatientFound = $Patient;
				break;
			}
		}
		if ($PatientFound == null) {
			return Redirect::to('/lobby')->with('error', 'Patient not found');
		}
		$Genders = ReadData::genderData();
		$Diseases = ReadData::diseaseData();
		return view('EditPatient', [
			'Genders' => $Genders,
			'Diseases' => $Diseases,
			'Patient' => $PatientFound,
		]);
	}

	public function editPatientSubmit(Request $request)
	{
		$Patients = ReadData::LobbyData();
		$PhysId = $request->input('PhysId');
		$name = $request->input('name');
		$age = $request->input('age');
		$gender = $request->input('gender');
		$disease = $request->input('disease');
		$message = $request->input('message');
		$created_at = date('H:i d-m-Y');
		unset($Patients[array_search($PhysId, array_column($Patients, 'PhysId'))]);
		array_push($Patients, [
			"PhysId" => $PhysId,
			"name" => $name,
			"age" => $age,
			"gender" => $gender,
			"disease" => $disease,
			"message" => $message,
			"created_at" => $created_at,
		]);
		usort($Patients, function ($a, $b) {
			return json_decode($a['disease'])->prioritized <=> json_decode($b['disease'])->prioritized;
		});
		WriteData::LobbyData($Patients);
		return Redirect::to('/lobby')->with('success', 'Patient added successfully');
	}
}
