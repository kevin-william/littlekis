<?php

namespace kis\sistema\helpers\session;

class Sessao {

    public function setSessao($sessionName, $value) {
        $_SESSION[$sessionName] = $value;
    }

    public function setLogin($userName, $idUsuario) {
        $_SESSION['logado'] = true;
        $_SESSION['username'] = $userName;
        $_SESSION['idUsuario'] = $idUsuario;
    }

    public function destroySession() {
        $_SESSION['logado'] = false;
        session_destroy();
        session_reset();
    }

    public function loginStatus() {
        if (isset($_SESSION) and $_SESSION['logado'] === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsername() {
        return $_SESSION['username'];
    }

}
