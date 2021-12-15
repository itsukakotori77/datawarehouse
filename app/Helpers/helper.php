<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helpers
 *
 */

function setActive($path, $active = 'active') 
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function setShow($path, $show = 'show') 
{
    return call_user_func_array('Request::is', (array)$path) ? $show : '';
}

function setSubmenu($path, $submenu = 'submenu') 
{
    return call_user_func_array('Request::is', (array)$path) ? $submenu : '';
}

function formatDate($array) 
{
    $string = date('Y-m-d', strtotime($array));
    return $string;
}

if (! function_exists('num_row')) {
	function num_row($page, $limit) {
		if (is_null($page)) {
			$page = 1;
		}

		$num = ($page * $limit) - ($limit - 1);
		return $num;
	}
}

function rupiah($angka)
{	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

function readCSV($csvFile, $array)
{
    $file_handle = fopen($csvFile, 'r');
    while (!feof($file_handle)) {
        $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
    }
    fclose($file_handle);
    return $line_of_text;
}

function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}

function exportCSV($object)
{
    $filename = "tweets.csv";

    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );

    $columns = array(
        'Kode_UMKM', 
        'Nama', 
        'Komoditi', 
        'Sektor', 
        'Alamat', 
        'Tahun_Berdiri', 
        'Tenaga_Kerja', 
        'Aset', 
        'Omzet', 
        'Telepon',
        'Pemasaran',
        'Tanggal',
        'Jenis_ID',
        'created_at',
        'updated_at',
    );

    $callback = function() use($object, $columns) 
    {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($object as $task) 
        {
            $row['Kode_UMKM'] = $task->Kode_UMKM;
            $row['Nama'] = $task->Nama;
            $row['Komoditi'] = $task->Komoditi;
            $row['Sektor'] = $task->Sektor;
            $row['Alamat'] = $task->Alamat;
            $row['Tahun_Berdiri'] = $task->Tahun_Berdiri;
            $row['Tenaga_Kerja'] = $task->Tenaga_Kerja;
            $row['Aset'] = $task->Aset;
            $row['Omzet'] = $task->Omzet;
            $row['Telepon'] = $task->Telepon;
            $row['Pemasaran'] = $task->Pemasaran;
            $row['Tanggal'] = $task->Tanggal;
            $row['Jenis_ID'] = $task->Jenis_ID;
            $row['created_at'] = $task->created_at;
            $row['updated_at'] = $task->updated_at;

            // fputcsv($file, array($row['Title'], $row['Assign'], $row['Description'], $row['Start Date'], $row['Due Date']));
            fputcsv(
                $row['Kode_UMKM'], 
                $row['Nama'], 
                $row['Komoditi'], 
                $row['Sektor'], 
                $row['Alamat'], 
                $row['Tahun_Berdiri'], 
                $row['Tenaga_Kerja'], 
                $row['Aset'], 
                $row['Omzet'], 
                $row['Telepon'],
                $row['Pemasaran'],
                $row['Tanggal'],
                $row['Jenis_ID'],
                $row['created_at'],
                $row['updated_at']
            );
        }

        fclose($file);
    };

    return response()->download($file, 'tweets.csv', $headers);
}
