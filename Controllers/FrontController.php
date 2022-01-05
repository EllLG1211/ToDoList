<?php
require_once "Config/config.php";
class FrontController
{
    function __construct() {
        global $views, $controls, $sanitizer, $model;
        require_once $sanitizer;

        $listeAction = array('Home','Sign in', 'Log in', 'Log out', 'Register', 'Browse lists', 'View list', 'New account', 'Create list', 'New list', 'Delete list', 'Delete list confirmed', 'Complete task', 'Add task', 'Create task');

        session_start();

        $errors = array();

        try {
            if(!empty($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            }
            else {
                $action = 'Home';
            }
            if($action != 'Home') include $views['header'];
            if(in_array($action, $listeAction)) {
                switch ($action) {
                    case 'Home':
                        include $views['home'];
                        break;
                    case 'Sign in':
                        require_once $controls['sign in'];
                        new SignInController();
                        break;
                    case 'Log in':
                        require_once $controls['log in'];
                        $username = sanitize($_REQUEST['name']);
                        $password = sanitize($_REQUEST['password']);
                        new LogInController($username, $password);
                        break;
                    case 'Register':
                        include $views['register'];
                        break;
                    case 'Log out':
                        require_once $controls['log out'];
                        new LogOutController();
                        break;
                    case 'New account':
                        require_once $controls['register'];
                        $username = sanitize($_REQUEST['name']);
                        $password = sanitize($_REQUEST['password']);
                        $confirmation = sanitize($_REQUEST['confirmation']);
                        new RegisterController($username, $password, $confirmation);
                        break;
                    case 'Browse lists':
                        require_once $controls['task lists browser'];
                        new TaskListsBrowserController();
                        break;
                    case 'View list':
                        if(isset($_REQUEST['choice'])) $id = (int) $_REQUEST['choice'];
                        else $id = (int) $_REQUEST['listId'];
                        require_once $controls['view list'];
                        new ViewListController($id);
                        break;
                    case 'Create list':
                        include $views['create list'];
                        break;
                    case 'New list':
                        require_once $model['user'];
                        require_once $controls['new list'];
                        $creator = MdlUser::isConnected();
                        $name = sanitize($_REQUEST['listName']);
                        $visibility = (int) $_REQUEST['visibility'];
                        new AddListController($name, $visibility, $creator);
                        break;
                    case 'Delete list':
                        global $listId;
                        $listId = (int) $_REQUEST['listId'];
                        require $views['delete list confirmation'];
                        break;
                    case 'Delete list confirmed':
                        require_once $controls['delete list'];
                        $listId = (int) $_REQUEST['listId'];
                        new DeleteListController($listId);
                        break;
                    case 'Complete task':
                        require_once $controls['complete task'];
                        require_once $controls['view list'];
                        $listId = (int) $_REQUEST['listId'];
                        $taskId = (int) $_REQUEST['taskId'];
                        new CompleteTaskController($taskId);
                        new ViewListController($listId);
                        break;
                    case 'Add task':
                        global $listId;
                        $listId = (int) $_REQUEST['listId'];
                        include $views['add task'];
                        break;
                    case 'Create task':
                        require_once $controls['create task'];
                        require_once $controls['view list'];
                        $listId = (int) $_REQUEST['listId'];
                        $taskName = sanitize($_REQUEST['taskName']);
                        new CreateTaskController($taskName, $listId);
                        new ViewListController($listId);
                        break;
                    default:
                        echo "<h3>This functionality has not been implemented yet.</h3>";
                }
            }
            else echo "<h3>This functionality has not been implemented yet.</h3>";
            if ($action != 'Sign in' && $action != 'Log in') include $views['logout shortcut'];
        }
        catch (PDOException $e){
            $errors[] = "Database error!";
            require($views['error']);
        }
        catch (Exception $e2){
            $errors[] = "Unexpected error!";
            require($views['error']);
        }
    }
}