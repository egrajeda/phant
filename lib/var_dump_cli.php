<?php
/**
 * CLI colorizing for the var_dump command
 *
 * @author craig@there4development.com
 * @since 12/01/2011
 */


/**
 * Var dump with CLI coloring
 * 
 * @param mixed $expression variable for inspection
 *
 * @return void echo output
 */
function var_dump_cli($expression) {
  ob_start("colorize_cli");
  var_dump($expression);
  ob_end_flush();
}


/**
 * Colorize var_dump() output
 * 
 * @param string $text output of var_dump
 *
 * @return string colorized text with color escape codes
 */
function colorize_cli($text) {

  $replacements = array(
      'int('    => tc_colored('int' , 'blue') . '(',
      'string(' => tc_colored('string' , 'green') . '(',
      'float('  => tc_colored('float' , 'cyan') . '(',
      'bool('   => tc_colored('bool' , 'magenta') . '(',
      'NULL'    => tc_colored('NULL' , 'white', 'on_red', 'bold')
  );

  $colorized = str_replace(
      array_keys($replacements),
      array_values($replacements),
      $text
  );
  return $colorized;
}


/* end of file var_dump_cli.php */