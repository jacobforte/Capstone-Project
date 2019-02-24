<?php
/**
 * \file
 * A documented file.
 * This file contains test documentation, look over it to see examples of doxygen
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
  private $invisibleVar; /** This variable wont show in the documentation because it is private */

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

/**
 * The test output function returns static text.
 * The top comment with the \\file is need for doxigen to check nonclass variables and functions.
 * This starts the detailed description. Check doxygen documentation for more structure commands.
 * INPUT: none
 * OUTPUT: a string containing an html page
 */
public function TestOutput() {
  return "<h1>Hello World</h1>
      <p>Written by Jacob Forte</p>
      <p>Some change 4</p>

      <div>
        <p>Testing 1,2,3 by marcus johnson</p>
        <h7>This was written in PHP.</h7>
      </div>";
}


$html = TestOutput(); /**< Used to store the TestOutput's output */
$testClass = new Test;  /**< This is a object of the Test class */
$testClass->setHtmlOut($html);
echo $testClass->getHtmlOut();
?>