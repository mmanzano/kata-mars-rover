<?php

namespace Code;

class RoverState {
  private $x;
  private $y;
  private $direction;

  const ADJUSTS = [
    'E' => [
      'x' => 1,
      'y' => 0,
    ],
    'N' => [
      'x' => 0,
      'y' => 1,
    ],
    'W' => [
      'x' => -1,
      'y' => 0,
    ],
    'S' => [
      'x' => 0,
      'y' => -1,
    ],
  ];

  public function __construct($x, $y, $direction) {
    $this->x = $x;
    $this->y = $y;
    $this->direction = $direction;
  }

  public function moveForward() {
    $this->x = $this->x + self::ADJUSTS[$this->direction]['x'];
    $this->y = $this->y + self::ADJUSTS[$this->direction]['y'];
  }

  public function moveBackward() {
    $this->x = $this->x - self::ADJUSTS[$this->direction]['x'];
    $this->y = $this->y - self::ADJUSTS[$this->direction]['y'];
  }

  public function turnLeft() {
    $directions = [
      'E' => 'N',
      'N' => 'W',
      'W' => 'S',
      'S' => 'E',
    ];

    $this->direction = $directions[$this->direction];
  }

  public function turnRight() {
    $directions = [
      'E' => 'S',
      'S' => 'W',
      'W' => 'N',
      'N' => 'E',
    ];

    $this->direction = $directions[$this->direction];
  }
}