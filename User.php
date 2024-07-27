<?php


if (!$_POST['action']) {
    return json_encode('LLene el campo');
}
$action = $_POST['action'];
$box = new User;
echo json_encode(match ($action) {
    'search__name'      => $box->search__user($_POST['name'], 'name'),
    'search__last_name' => $box->search__user($_POST['last_name'], 'last_name')
});


class User
{
    private array $users = [
        [
            'name'      => "Jim",
            'last_name' => "Pilin"
        ],
        [
            'name'      => "Jim",
            'last_name' => "Walker"
        ],
        [
            'name'      => "John",
            'last_name' => "Boss"
        ],
        [
            'name'      => "Tony",
            'last_name' => "Jao"
        ],
        [
            'name'      => "Lili",
            'last_name' => "Pink"
        ],
        [
            'name'      => "Rose",
            'last_name' => "Winy"
        ],
        [
            'name'      => "William",
            'last_name' => "Parker"
        ],
        [
            'name'      => "Derek",
            'last_name' => "Hoking"
        ],
        [
            'name'      => "Tobby",
            'last_name' => "Hoking"
        ],
        [
            'name'      => "Jimmy",
            'last_name' => "Miller"
        ],
        [
            'name'      => "Lisa",
            'last_name' => "Miller"
        ],
    ];
    /* ------------- Automatización ------------- */
    public function __construct()
    {
        $this->list__task();
    }

    /* ------------- Método de Flujo ------------- */
    public function list__task()
    {
        $action = 'search__name'; // $this->post__verify('action');
        $name = 'Jim'; // $this->post__verify('name');
        if ($action === false) {
            return 'Crazy';
        }
        if ($name === false) {
            return 'Vacio';
        }

        match ($action) {
            'search__name' => $this->search__user($name, 'name')
        };
    }

    /* ------------- Verificar Método POST ------------- */
    private function post__verify($post)
    {
        if ($_POST[$post]) {
            return true;
        } else {
            return false;
        }
    }

    /* ------------- Buscar Usuario por nombre o apellido ------------- */
    public function search__user(string $name, string $find)
    {
        $persons = [];
        for ($i = 0; $i <= count($this->users); $i++) {
            for ($j = 0; $j < 1; $j++) {
                if ($this->users[$i][$find] === $name) {
                    array_push($persons, $this->users[$i]);
                }
            }
        }
        if ($persons) {
            return $persons;
        } else {
            return false;
        }
    }
}
