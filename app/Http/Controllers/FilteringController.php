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
        $request->validate([
            'keywords' => 'string|required'
        ]);

        // Ambil input keywords, pisahkan berdasarkan koma
        $keywordsInput = $request->input('keywords'); // Format: "word1,word2,word3"
        $keywords = array_map('trim', explode(',', $keywordsInput));


        // Path ke file CSV
        $file = public_path('dataset/data_train.csv');
        $dataTrain = [];

        // Baca file CSV dan simpan data
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

        // Hitung total kemunculan di HAM dan SPAM
        $result = [
            'total_ham' => 0,
            'total_spam' => 0,
            'details' => []
        ];

        $newWord = []; // Menampung huruf awal kata yang telah diperbarui
        foreach ($keywords as $word) {
            $word = ucfirst(strtolower($word)); // Format kata sesuai (misalnya 'Job' bukan 'job')
            $newWord[] = $word;
            if (isset($dataTrain[$word])) {
                $result['details'][$word] = $dataTrain[$word];
                $result['total_ham'] += $dataTrain[$word]['ham'];
                $result['total_spam'] += $dataTrain[$word]['spam'];
            } else {
                $result['details'][$word] = ['ham' => 0, 'spam' => 0];
            }
        }

        // Return hasil sebagai JSON

        $priorProbability = ['ham' => 0.6, 'spam' => 0.4];
        $hamProbability = $priorProbability['ham'];
        $spamProbability = $priorProbability['spam'];

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
        foreach ($newWord as $word) {
            if ($result['details'][$word]['spam'] == 0) {
                $spamProbability *= 0.007518796992;
            } else if ($result['details'][$word]['spam'] == 1) {
                $spamProbability *= 0.01503759398;
            } else if ($result['details'][$word]['spam'] == 2) {
                $spamProbability *= 0.02255639098;
            }
        }


        $score = "";
        if ($hamProbability > $spamProbability) {
            $score = "HAM";
        } else if ($hamProbability < $spamProbability) {
            $score = "SPAM";
        }

        $finalScore = ['hamProbability' => $hamProbability, 'spamProbability' => $spamProbability, 'score' => $score];

        return view('result', compact('finalScore', 'result'));
    }
}
