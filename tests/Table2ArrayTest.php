<?php
use PHPUnit\Framework\TestCase;

use Inkrement\Table2Array\Table2ArrayConverter;

class Table2ArrayTest extends TestCase
{

  function testWithHeader(){
    $table = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'simple_table_header.html');

    $result = Table2ArrayConverter::convert($table);

    $this->assertEquals(2, count($result));
    $this->assertEquals(3, count($result[0]));
    $this->assertEquals(3, count($result[1]));
  }

  function testComplexWithHeader(){
    $table = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'complex_table_header.html');

    $result = Table2ArrayConverter::convert($table);

    var_dump($result[0]);

    //$this->assertEquals(2, count($result));
    //$this->assertEquals(3, count($result[0]));
    //$this->assertEquals(3, count($result[1]));
  }


  function testOnNull(){
    $this->assertEquals([], Table2ArrayConverter::convert(null));
  }

  function testOnAntiString(){
    $this->assertEquals([], Table2ArrayConverter::convert([]));
    $this->assertEquals([], Table2ArrayConverter::convert(2));
    $this->assertEquals([], Table2ArrayConverter::convert(True));
  }

}

?>
