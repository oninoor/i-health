<?php

function notificationAndRedirect(string $typeMessage, string $message, string $url)
{
  session()->setFlashdata($typeMessage, $message);
  return redirect()->to($url);
}

function notificationAndRedirectWithInput(string $typeMessage, string $message, string $url)
{
  session()->setFlashdata($typeMessage, $message);
  return redirect()->to($url)->withInput();
}
