<?php

namespace App\Faker;

use Faker\Provider\Base;

class CpfProvider extends Base
{
    public function cpf()
    {
        $n = [rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9)];
        $n[9] = $this->calculateDigit($n, 10);
        $n[10] = $this->calculateDigit($n, 11);
        return implode('', $n);
    }

    private function calculateDigit($n, $length)
    {
        $sum = 0;
        for ($i = 0; $i < $length - 1; $i++) {
            $sum += $n[$i] * ($length - $i);
        }
        $remainder = $sum % 11;
        return $remainder < 2 ? 0 : 11 - $remainder;
    }
}