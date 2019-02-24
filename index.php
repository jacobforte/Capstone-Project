<?php
/// A test class. This is a brief description
/**
 * This class is used for testing doxygen.
 * This is an in-depth description for this class
 * It can store and return a variable of any type
 */
class Test {
  private $htmlOut; /**< This is a private variable. The less than symbol in the code is needed for comments after a line of code. */

  /// A set function
  /**
   * INPUT: Any variable
   * OUTPUT: None
   * 
   * This function sets the htmlOut variable
   */
  public function setHtmlOut($string) {
    $this->htmlOut = $string;
  }

  /// A get function
  /**
   * INPUT: None
   * OUTPUT: A string that has been previously set.
   * 
   * This functions returns the variable that was previously set
   */
  public function getHtmlOut() {
    return $this->htmlOut;
  }
}

/// The test output function returns static text.
/**
 * This starts the detailed description
 * INPUT: none
 * OUTPUT: a string containing an html page
 * 
 * This line of text was updated by the server automaticly
 */
function TestOutput() {
  return "<h1>Hello World</h1>
      <p>Written by Jacob Forte</p>
      <p>Some change 4</p>

      <div>
        <p>Testing 1,2,3 by marcus johnson</p>
        <h7>This was written in PHP.</h7>
      </div>";
}


$html = TestOutput();
$testClass = new Test;
$testClass->setHtmlOut($html);
echo $testClass->getHtmlOut();
?>