<?php

function _connection($action) {
    $result = array('success' => false, 'errors' => array());
    switch ($action) {
        case 'create':
            $conn = new Connection();
            if (!isset($_POST['host']) || $_POST['host'] == '') {
                $result['errors']['host'] = 'Хост не указан.';
            }
            if (!isset($_POST['user']) || $_POST['user'] == '') {
                $result['errors']['user'] = 'icon-companyПользователь не указан.';
            }
            if (!isset($_POST['port']) || $_POST['port'] == '') {
                $result['errors']['port'] = 'Порт не указан.';
            }
            if (!isset($_POST['password']) || $_POST['password'] == '') {
                $result['errors']['password'] = 'Пароль не указан.';
            }
            if (!count($result['errors'])) {
                $conn->set('host', $_POST['host']);
                $conn->set('user', $_POST['user']);
                $conn->set('password', $_POST['password']);
                $conn->set('port', $_POST['port']);
                if ($conn->create()) {
                    $result['success'] = true;
                }
            }
            break;
        case 'get':
            if ($_REQUEST['connection'] == 'root') {
                $conn = new Connection();
                $result['data'] = $conn->retrieve_many();

                foreach ($result['data'] as $k => $v) {
                    unset($result['data'][$k]['password']);
                    unset($result['data'][$k]['login']);
                    $result['data'][$k]['name'] = $result['data'][$k]['host'] . ':' . $result['data'][$k]['port'];
                }
            } elseif ($_REQUEST['connection'] == (string)(int)$_REQUEST['connection']) {
                $result['data'] = array(
                    array(
                        'id' => $_REQUEST['connection'] . '_tables',
                        'name' => 'Таблицы',
                        'iconCls' => 'icon_table'
                    ),
                    array(
                        'id' => $_REQUEST['connection'] . '_funcs',
                        'name' => 'Процедуры',
                        'iconCls' => 'icon_application_lightning'

                    )
                );
            }
            $result['success'] = true;
            break;
        case 'test':
            $conn = new Connection();
            if (!isset($_POST['host']) || $_POST['host'] == '') {
                $result['errors']['host'] = 'Хост не указан.';
            }
            if (!isset($_POST['user']) || $_POST['user'] == '') {
                $result['errors']['user'] = 'icon-companyПользователь не указан.';
            }
            if (!isset($_POST['port']) || $_POST['port'] == '') {
                $result['errors']['port'] = 'Порт не указан.';
            }
            if (!isset($_POST['password']) || $_POST['password'] == '') {
                $result['errors']['password'] = 'Пароль не указан.';
            }
            if (!count($result['errors'])) {
                $conn->set('host', $_POST['host']);
                $conn->set('user', $_POST['user']);
                $conn->set('password', $_POST['password']);
                $conn->set('port', $_POST['port']);
                $result = $conn->test();
            }
            break;

    }

    echo json_encode($result);
}