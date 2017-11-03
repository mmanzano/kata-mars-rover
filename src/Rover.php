<?php

namespace Code;

class Rover {
  /**
   * @var RoverState
   */
  private $state;

  public function __construct(RoverState $state) {
    $this->state = $state;
  }

  public function process($commands) {
    foreach ($commands as $command) {
      switch ($command) {
        case 'f':
          $this->state->moveForward();
          break;
        case 'b':
          $this->state->moveBackward();
          break;
        case 'l':
          $this->state->turnLeft();
          break;
        case 'r':
          $this->state->turnRight();
          break;
      }
    }
  }

  public function obtainPosition() {
    return $this->state;
  }
}
