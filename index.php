<?php
require_once('someClass.inc.php');
/**
 * \file
 * A documented file.
 * This file contains test documentation for a web page, look over it to see examples of doxygen
 */

/**
 * The test output function returns static text.
 * The top comment with the \\file is need for doxigen to check nonclass variables and functions.
 * This starts the detailed description. Check doxygen documentation for more structure commands.
 * INPUT: none
 * OUTPUT: a string containing an html page
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


$html = TestOutput(); /**< Used to store the TestOutput's output */
$testClass = new Test;  /**< This is a object of the Test class */
$testClass->setHtmlOut($html);
echo $testClass->getHtmlOut();
?>