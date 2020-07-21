<?php

function user_admin()
{

  $ci = &get_instance();
  if (!$ci->session->userdata('username')) {
    redirect('auth');
  } else {
    $role_id = $ci->session->userdata('role_id');
    if ($role_id != 1) {
      redirect('auth/blocked');
    }
  }
}

function user_staff()
{

  $ci = &get_instance();
  if (!$ci->session->userdata('username')) {
    redirect('auth');
  } else {
    $role_id = $ci->session->userdata('role_id');
    if ($role_id != 2) {
      redirect('auth/blocked');
    }
  }
}