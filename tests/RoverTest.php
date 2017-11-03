<?php

namespace CodeTest;

use Code\Rover;
use Code\RoverState;

class RoverTest extends \PHPUnit_Framework_TestCase {
  /** @test */
  public function given_a_rover_with_initial_position_and_commands_is_empty_final_position_is_the_same() {
    $rover = $this->obtainRover([0, 0, 'E']);
    $commands = [];

    $rover->process($commands);

    $finalPosition = new RoverState(0, 0, 'E');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_command_the_rover_move_forward() {
    $rover = $this->obtainRover([0, 0, 'E']);
    $commands = ['f'];

    $rover->process($commands);

    $finalPosition = new RoverState(1, 0, 'E');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_command_the_rover_move_backward() {
    $rover = $this->obtainRover([1, 0, 'E']);
    $commands = ['b'];

    $rover->process($commands);

    $finalPosition = new RoverState(0, 0, 'E');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_command_the_rover_move_forward_backward() {
    $rover = $this->obtainRover([0, 0, 'E']);
    $commands = ['f', 'b'];

    $rover->process($commands);

    $finalPosition = new RoverState(0, 0, 'E');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_command_the_rover_turn_left() {
    $rover = $this->obtainRover([0, 0, 'E']);
    $commands = ['l'];

    $rover->process($commands);

    $finalPosition = new RoverState(0, 0, 'N');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_command_the_rover_turn_left_from_north() {
    $rover = $this->obtainRover([0, 0, 'N']);
    $commands = ['l'];

    $rover->process($commands);

    $finalPosition = new RoverState(0, 0, 'W');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_turn_right_command_the_rover_change_direction() {
    $rover = $this->obtainRover([0, 0, 'E']);
    $commands = ['r'];

    $rover->process($commands);

    $finalPosition = new RoverState(0, 0, 'S');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_right_command_the_rover_turn_right_from_south() {
    $rover = $this->obtainRover([0, 0, 'S']);
    $commands = ['r'];

    $rover->process($commands);

    $finalPosition = new RoverState(0, 0, 'W');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_turn_left_right_command_the_rover_remain_the_same_direction() {
    $rover = $this->obtainRover([0, 0, 'W']);
    $commands = ['l', 'r'];

    $rover->process($commands);

    $finalPosition = new RoverState(0, 0, 'W');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_turn_left_forward_command_the_rover_move_to_north() {
    $rover = $this->obtainRover([0, 0, 'E']);
    $commands = ['l', 'f'];

    $rover->process($commands);

    $finalPosition = new RoverState(0, 1, 'N');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_list_of_commands_the_rover_move_to_1_1_E() {
    $rover = $this->obtainRover([0, 0, 'E']);
    $commands = ['l', 'f', 'r', 'f'];

    $rover->process($commands);

    $finalPosition = new RoverState(1, 1, 'E');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /** @test */
  public function given_a_turn_right_backward_command_the_rover_move_to_north() {
    $rover = $this->obtainRover([0, 0, 'E']);
    $commands = ['r', 'b'];

    $rover->process($commands);

    $finalPosition = new RoverState(0, 1, 'S');
    $this->assertEquals($finalPosition, $rover->obtainPosition());
  }

  /**
   * @param array state
   * @return Rover
   */
  private function obtainRover($state) {
    $initialPosition = new RoverState(...$state);
    return new Rover($initialPosition);
  }
}
