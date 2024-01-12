<?php 

// CREATE TABLE IF NOT EXISTS USER (
//     idUtil INT(11) NOT NULL AUTO_INCREMENT,
//     username VARCHAR(255) NOT NULL,
//     password VARCHAR(255) NOT NULL,
//     admin BOOLEAN NOT NULL DEFAULT 0,
//     PRIMARY KEY (id)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

class User {

    private int $id;
    private string $username;
    private string $password;
    private bool$admin;

    public function __construct(int $id, string $username, string $password, bool $admin){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->admin = $admin;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getUsername(): string{
        return $this->username;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function getAdmin(): bool{
        return $this->admin;
    }

    public function __toString(): string{
        return $this->render();
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setUsername(string $username): void{
        $this->username = $username;
    }

    public function setPassword(string $password): void{
        $this->password = $password;
    }

    public function setAdmin(bool $admin): void{
        $this->admin = $admin;
    }

    // copilot a fait ça, pas moi, a vérifier
    public function render(): string{
        return sprintf(
            '<div class="user">
                <p>id : %s</p>
                <p>username : %s</p>
                <p>password : %s</p>
                <p>admin : %s</p>
            </div>',
            $this->id,
            $this->username,
            $this->password,
            $this->admin);
    }
}