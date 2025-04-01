<?php 

function is_blank($value) {
  return !isset($value) || trim($value) === '';
}


function has_presence($value) {
  return !is_blank($value);
}

function has_length_greater_than($value, $min) {
  $length = strlen($value);
  return $length > $min;
}

function has_length_less_than($value, $max) {
  $length = strlen($value);
  return $length < $max;
}

function has_length_exactly($value, $exact) {
  $length = strlen($value);
  return $length == $exact;
}
