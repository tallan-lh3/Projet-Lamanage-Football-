<?php
class Admin extends Database
{
    private $id;
    private $lastname;
    private $firstname;
    private $mail;
    private $pwd;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of pwd
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set the value of pwd
     *
     * @return  self
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
    }
// Method permettant de cree un admin
    public function createAdmin()
    {
        $pdoQuery = "INSERT INTO lamanage_admins (admins_firstname, admins_lastname, admins_mail, admins_pwd) VALUES (:admins_firstname, :admins_lastname, :admins_mail, :admins_pwd)";

        $pdoResult = $this->db->prepare($pdoQuery);
        $pdoResult->bindValue(':admins_lastname', $this->getLastname(), PDO::PARAM_STR);
        $pdoResult->bindValue(':admins_firstname', $this->getFirstname(), PDO::PARAM_STR);
        $pdoResult->bindValue(':admins_mail', $this->getMail(), PDO::PARAM_STR);
        $pdoResult->bindValue(':admins_pwd', $this->getPwd(), PDO::PARAM_STR);

        if ($pdoResult->execute()) {
            return true;
        } else {
            return false;
        }
    }
// Method permettant listé tout les admins
    public function listAdmin()
    {
        $listAdmin = $this->db->query("SELECT * FROM lamanage_admins");
        $AdminList = $listAdmin->fetchAll();
        return $AdminList;
    }

// Method permettant d'avoir les informations d'un joueur en particulier selon sont id (profil, delete)
    public function infoAdmin()
    {
        $infoAdmin = $this->db->prepare("SELECT * FROM lamanage_admins WHERE admins_id = :id");
        $infoAdmin->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        if ($infoAdmin->execute()) {
            $InfoAdmin = $infoAdmin->fetchAll();
            return $InfoAdmin; // return un tableau associatif
        }
    }

    // Method permettant d'editer un joueur
    public function editAdmin()
    {
        $EditAdmin = $this->db->prepare("UPDATE lamanage_admins SET admins_firstname = :firstname, admins_lastname = :lastname, admins_pwd = :pwd, admins_mail = :mail WHERE admins_id = :id");

        $EditAdmin->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        $EditAdmin->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $EditAdmin->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $EditAdmin->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
        $EditAdmin->bindValue(':pwd', $this->getPwd(), PDO::PARAM_STR);
        if ($EditAdmin->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //METHODE POUR RECHERCHER SI LA BDD CONTIENT UN ADMIN AU MAIL IDENTIQUE
    public function emailExist($emailToCheck)
    {
        $pdoStat = $this->db->prepare('SELECT * FROM lamanage_admins WHERE admins_mail = :emailAdmin');
        $pdoStat->bindValue(':emailAdmin', $emailToCheck, PDO::PARAM_STR);
        //Exécution de la requête préparée
        $pdoStat->execute();
        $result = $pdoStat->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return true;
        } else {
            return false;
        };

    }
// Method permettant de supprimer un admins
    public function DeleteAdmin()
    {
        $DeleteAdmin = $this->db->prepare("DELETE FROM lamanage_admins
        WHERE admins_id = :id");
        $DeleteAdmin->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        if ($DeleteAdmin->execute()) {
            return true;
        } else {
            return false;
        }
    }

// Methode pour cree une session en fonction de l'email saisie
    public function createSession($email)
    {
        $pdoStat = $this->db->prepare('SELECT * FROM lamanage_admins WHERE admins_mail = :emailAdmin');
        $pdoStat->bindValue(':emailAdmin', $email, PDO::PARAM_STR);
        //Exécution de la requête préparée
        $pdoStat->execute();
        $result = $pdoStat->fetch(PDO::FETCH_ASSOC);
        return $result;

    }
}
