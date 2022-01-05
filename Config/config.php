<?php

//database
$database = "mysql:host=localhost;dbname=progweb_proj_todo_list";
$login = "root";
$passwd = "4bb3E7231F1F922154";
$connection = "Model/Util/Connection.php";

//models
$model['user'] = "Model/MdlUser.php";

//entities
$ent['user'] = "Model/Entities/User.php";
$ent['visibility'] = "Model/Entities/visibility.php";
$ent['task list'] = "Model/Entities/TaskList.php";
$ent['task'] = "Model/Entities/Task.php";

//gateways
$gateways['log in'] = "Model/Gateways/ConnectionAttemptGateway.php";
$gateways['add user'] = "Model/Gateways/AddUserGateway.php";
$gateways['fetch task lists'] = "Model/Gateways/FetchTaskListsGateway.php";
$gateways['fetch list from id'] = "Model/Gateways/FetchListFromIdGateway.php";
$gateways['fetch tasks'] = "Model/Gateways/FetchTasksGateway.php";
$gateways['add list'] = "Model/Gateways/AddTaskListGateway.php";
$gateways['delete list'] = "Model/Gateways/DeleteTaskListGateway.php";
$gateways['complete task'] = "Model/Gateways/CompleteTaskGateway.php";
$gateways['add task'] = "Model/Gateways/AddTaskGateway.php";

//views
$views['home'] = "Views/homepage.php";
$views['auth'] = "Views/auth.php";
$views['register'] = "Views/register.php";
$views['error'] = "Views/error.php";
$views['header'] = "Views/header.php";
$views['signed in'] = "Views/signed_in.php";
$views['signed out'] = "Views/signed_out.php";
$views['logout shortcut'] = "Views/logout_shortcut.php";
$views['task lists browser'] = "Views/task_lists_browser.php";
$views['task lists browser task'] = "Views/task_lists_browser_task.php";
$views['view list'] = "Views/view_list.php";
$views['view list task'] = "Views/view_list_task.php";
$views['create list'] = "Views/create_list.php";
$views['list created'] = "Views/list_created.php";
$views['delete list confirmation'] = "Views/delete_list_confirmation.php";
$views['list deleted'] = "Views/list_deleted.php";
$views['add task'] = "Views/add_task.php";

//controllers
$controls['front'] = "Controllers/FrontController.php";
$controls['sign in'] = "Controllers/SignInController.php";
$controls['log in'] = "Controllers/LogInController.php";
$controls['log out'] = "Controllers/LogOutController.php";
$controls['register'] = "Controllers/RegisterController.php";
$controls['task lists browser'] = "Controllers/TaskListsBrowserController.php";
$controls['view list'] = "Controllers/ViewListController.php";
$controls['new list'] = "Controllers/AddListController.php";
$controls['delete list'] = "Controllers/DeleteListController.php";
$controls['complete task'] = "Controllers/CompleteTaskController.php";
$controls['create task'] = "Controllers/CreateTaskController.php";

//util
$sanitizer = "Config/sanitize_sql.php";