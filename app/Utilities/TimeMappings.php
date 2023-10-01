<?php

namespace App\Utilities;

class TimeMappings
{
 public static $timeMappings = [
  'A' => ['07:30:00', '08:00:00'],
  'B' => ['08:30:00', '09:00:00'],
  'C' => ['09:30:00', '10:00:00'],
  'D' => ['10:30:00', '11:00:00'],
  'E' => ['11:30:00', '12:00:00'],
  'F' => ['12:30:00', '13:00:00'],
  'G' => ['13:30:00', '14:00:00'],
  'H' => ['14:30:00', '15:00:00'],
  'I' => ['15:30:00', '16:00:00'],
  'J' => ['16:30:00', '17:00:00'],
  'K' => ['17:30:00', '18:00:00'],
  'L' => ['18:30:00', '19:00:00'],
  'M' => ['19:30:00', '20:00:00'],
 ];

 public static function getMapping($letter)
 {
  return self::$timeMappings[$letter] ?? null;
 }

 public static function convertToLetter($time)
 {
  foreach (self::$timeMappings as $letter => $timeRange) {
   $startTime = $timeRange[0];
   $endTime = $timeRange[1];
   if ($time >= $startTime && $time <= $endTime) {
    return $letter;
   }
  }
  return null; // Jika tidak ada kecocokan.
 }
}
