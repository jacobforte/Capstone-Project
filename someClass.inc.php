<?php
/**
 * \file
 * A documented file.
 * This file contains test documentation for a class, look over it to see examples of doxygen
 */

/**
 * A test class. This is a brief description, the brief ends at the first period or first endline. See?\n
 * This class is used for testing doxygen.\n
 * This is an in-depth description for this class\n
 * It can store and return a variable of any type\n
 * Doxygen requires \\n in orderr to end the line.
 * 
 * Adding a line space adds a larger gap between lines.
 */
class Test {
  public $htmlOut; /**< This is a public variable. The less than symbol in the code is needed for comments after a line of code. */
  private $invisibleVar; /**< This variable wont show in the documentation because it is private */

  /**
   * A set function.
   * INPUT: Any variable
   * OUTPUT: None
   * 
   * This function sets the htmlOut variable
   */
  public function setHtmlOut($string) {
    $this->htmlOut = $string;
  }

  /**
   * \fn
   * A get function.
   * INPUT: None
   * OUTPUT: A string that has been previously set.
   * 
   * This functions returns the variable that was previously set.
   * This line of text was updated by the server automaticly.
   */
  public function getHtmlOut() {
    return $this->htmlOut;
  }
}
?>