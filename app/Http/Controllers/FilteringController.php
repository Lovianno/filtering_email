<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilteringController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function analyze(Request $request)
    {
        // Validasi input tidak boleh kosong dan harus string
        $request->validate([
            'keywords' => 'string|required'
        ]);

        // Ambil input user, dan merubah formatnya dengan memisahkan kata berdasarkan koma
        $keywordsInput = $request->input('keywords');
        $keywords = array_map('trim', explode(',', $keywordsInput));


        // Path ke file CSV
        $file = public_path('dataset/data_train.csv');
        $dataTrain = [];

        // Baca file dari CSV dan simpan kedalam dataTrain
        if (($handle = fopen($file, "r")) !== FALSE) {
            $header = fgetcsv($handle); // Ambil header (Kata, HAM, SPAM)
            while (($data = fgetcsv($handle)) !== FALSE) {
                $dataTrain[$data[0]] = [
                    'ham' => (int)$data[1],
                    'spam' => (int)$data[2],
                ];
            }
            fclose($handle);
        }

        $result = [
            'total_ham' => 0,
            'total_spam' => 0,
            'details' => []
        ];


        $newWord = []; // Menampung huruf awal kata yang telah diperbarui

        //Proses menghitung berapa kali kemunculan kata, ham dan spam dari keyword yang di input user
        foreach ($keywords as $word) {
            $word = ucfirst(strtolower($word)); // Format kata sesuai (misalnya 'Job' bukan 'job') agar sama
            $newWord[] = $word;
            if (isset($dataTrain[$word])) {
                $result['details'][$word] = $dataTrain[$word];
                $result['total_ham'] += $dataTrain[$word]['ham'];
                $result['total_spam'] += $dataTrain[$word]['spam'];
            } else {
                $result['details'][$word] = ['ham' => 0, 'spam' => 0];
            }
        }

        // buat priorProbability nya
        $priorProbability = ['ham' => 0.6, 'spam' => 0.4];

        // buat variabel  untuk menyimpan hasil score probabilitas
        $hamProbability = $priorProbability['ham'];
        $spamProbability = $priorProbability['spam'];

        // Kondisi perhitungan probabilitas HAM
        foreach ($newWord as $word) {
            if ($result['details'][$word]['ham'] == 0) {
                $hamProbability *= 0.006578947368;
            } else if ($result['details'][$word]['ham'] == 1) {
                $hamProbability *= 0.01315789474;
            } else if ($result['details'][$word]['ham'] == 2) {
                $hamProbability *= 0.01973684211;
            } else if ($result['details'][$word]['ham'] == 3) {
                $hamProbability *= 0.02631578947;
            }
        }

        // Kondisi perhitungan probabilitas SPAM
        foreach ($newWord as $word) {
            if ($result['details'][$word]['spam'] == 0) {
                $spamProbability *= 0.007518796992;
            } else if ($result['details'][$word]['spam'] == 1) {
                $spamProbability *= 0.01503759398;
            } else if ($result['details'][$word]['spam'] == 2) {
                $spamProbability *= 0.02255639098;
            }
        }

        // Hasil keterangan probabilitas
        $score = "";
        if ($hamProbability > $spamProbability) {
            $score = "HAM";
        } else if ($hamProbability < $spamProbability) {
            $score = "SPAM";
        }

        $finalScore = ['hamProbability' => $hamProbability, 'spamProbability' => $spamProbability, 'score' => $score];
        return view('result', compact('finalScore', 'result'));
    }


    public function indexAkurasi()
    {
        return view('akurasi');
    }
}
