<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/AccountModel.php';

class AccountController extends BaseController {

    public function index() {
        $this->render('account.view.php', ['navFile' => $this->navFile]);
    }

    public function loadUserInfo($userID) {
        $accountInfo = AccountModel::getAccountInfo($userID);
        header('Content-Type: application/json');
        echo json_encode($accountInfo);
        exit;
    }
}
