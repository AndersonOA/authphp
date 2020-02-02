<?php


namespace Source\Controllers;


use Source\Models\User;

/**
 * Class Web
 * @package Source\Controllers
 */
class Web extends Controller
{
    /**
     * Web constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);

        if (!empty($_SESSION["user"])) {
            $this->router->redirect("app.home");
        }
    }

    /**
     *
     */
    public function login(): void
    {
        $head = $this->seo->optimize(
            "Faça Login para continuar | " . site("name"),
            site("desc"),
            $this->router->route("web.login"),
            routeImage("Login")
        )->render();

        echo $this->view->render("theme/login", [
           "head" => $head
        ]);
    }

    /**
     *
     */
    public function register(): void
    {
        $head = $this->seo->optimize(
            "Crie Sua Conta No " . site("name"),
            site("desc"),
            $this->router->route("web.register"),
            routeImage("Register")
        )->render();

        $form_user = new \stdClass();
        $form_user->first_name = null;
        $form_user->last_name = null;
        $form_user->email = null;


        echo $this->view->render("theme/register", [
            "head" => $head,
            "user" => $form_user
        ]);
    }

    /**
     * @param $data
     */
    public function forget($data): void
    {
        if (empty($_SESSION["forget"])) {
            flash("info", "Informe seu E-MAIL para recuperar a senha.");
            $this->router->route("web.forget");
        }

        $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
        $forget = filter_var($data["forget"], FILTER_DEFAULT);

        $errForget = "Não foi possível recuperar, tente novamente.";

        if (!$email || $forget) {
            flash("error", $errForget);
            $this->router->route("web.forget");
        }

        $user = (new User())->find("email = :e AND forget = :f", "e={$email}&f={$forget}")->fetch();
        if (!$user) {
            flash("error", $errForget);
            $this->router->route("web.forget");
        }

        $head = $this->seo->optimize(
            "Crie Sua Nova Senha | " . site("name"),
            site("desc"),
            $this->router->route("web.forget"),
            routeImage("Forget")
        )->render();

        echo $this->view->render("theme/forget", [
            "head" => $head
        ]);
    }

    /**
     * @param $data
     */
    public function reset($data): void
    {
        $head = $this->seo->optimize(
            "Recupere Sua Senha | " . site("name"),
            site("desc"),
            $this->router->route("web.reset"),
            routeImage("Reset")
        )->render();

        echo $this->view->render("theme/reset", [
            "head" => $head
        ]);
    }

    /**
     * @param $data
     */
    public function error($data): void
    {
        $error = filter_var($data["errcode"], FILTER_VALIDATE_INT);
        $head = $this->seo->optimize(
            "Ooops {$error} | " . site("name"),
            site("desc"),
            $this->router->route("web.error", ["errcode" => $error]),
            routeImage($error)
        )->render();

        echo $this->view->render("theme/error", [
            "head" => $head,
            "error" => $error
        ]);
    }
}