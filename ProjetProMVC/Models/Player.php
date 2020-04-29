<?php
class Player extends Database
{
    private $id;
    private $lastname;
    private $firstname;
    private $position;
    private $mail;
    private $picture;
    private $pwd;
    private $goal;
    private $assist;
    private $game;

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
     * Get the value of position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the value of position
     *
     * @return  self
     */
    public function setPosition($position)
    {
        $this->position = $position;

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
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

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

    /**
     * Get the value of goal
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * Set the value of goal
     *
     * @return  self
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;

        return $this;
    }

    /**
     * Get the value of assist
     */
    public function getAssist()
    {
        return $this->assist;
    }

    /**
     * Set the value of assist
     *
     * @return  self
     */
    public function setAssist($assist)
    {
        $this->assist = $assist;

        return $this;
    }

    /**
     * Get the value of game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set the value of game
     *
     * @return  self
     */
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
    }
// Method permettant de cree un joueur
    public function addPlayer()
    {

        $pdoQuery = "INSERT INTO lamanage_users (users_firstname, users_lastname, position_id, users_picture) VALUES (:users_firstname, :users_lastname, :position_id, :users_picture)";

        $pdoResult = $this->db->prepare($pdoQuery);
        $pdoResult->bindValue(':users_lastname', $this->getLastname(), PDO::PARAM_STR);
        $pdoResult->bindValue(':users_firstname', $this->getFirstname(), PDO::PARAM_STR);
        $pdoResult->bindValue(':position_id', $this->getPosition(), PDO::PARAM_INT);
        $pdoResult->bindValue(':users_picture', $this->getPicture(), PDO::PARAM_STR);
        if ($pdoResult->execute()) {
            return true;
        } else {
            return false;
        }

    }

    // Method permettant de listé tout mes joueur avec leur stats join

    public function listPlayer()
    {
        $listPlayer = $this->db->query("SELECT * FROM lamanage_users
        INNER JOIN lamanage_position ON lamanage_users.position_id = lamanage_position.position_id
        INNER JOIN lamanage_stats ON lamanage_users.users_id = lamanage_stats.users_id
        ");
        $PlayerList = $listPlayer->fetchAll();
        return $PlayerList;
    }

    // Method permettant de supprimer un joueur

    public function DeletePlayer()
    {

        $DeletePlayer = $this->db->prepare("DELETE FROM lamanage_users
        WHERE users_id = :id");
        $DeletePlayer->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        if ($DeletePlayer->execute()) {
            return true;
        } else {
            return false;
        }
    }
// Method permettant d'edit un joueur selon son id

    public function editPlayer()
    {
        $EditPlayer = $this->db->prepare("UPDATE lamanage_users SET users_firstname = :firstname, users_lastname = :lastname, users_picture = :picture, position_id = :position WHERE users_id = :id");

        $EditPlayer->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        $EditPlayer->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $EditPlayer->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $EditPlayer->bindValue(':picture', $this->getPicture(), PDO::PARAM_STR);
        $EditPlayer->bindValue(':position', $this->getPosition(), PDO::PARAM_INT);

        if ($EditPlayer->execute()) {
            return true;
        } else {
            return false;
        }
    }
// Method permettant de recupéré le dernier joueur crée pour pouvoir lui ajouté automatiquement des stats (voir createPlayerController)
    public function findLastId()
    {
        return $this->db->lastInsertId();
    }

    // Method permettant de recupere les infos d'un joueur selon id (profil delete)

    public function infoPlayer()
    {
        $infoPlayer = $this->db->prepare("SELECT * FROM lamanage_users
        INNER JOIN lamanage_position ON lamanage_users.position_id = lamanage_position.position_id
        INNER JOIN lamanage_stats ON lamanage_users.users_id = lamanage_stats.users_id WHERE lamanage_users.users_id = :id");
        $infoPlayer->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        if ($infoPlayer->execute()) {
            $InfoPlayer = $infoPlayer->fetchAll();
            return $InfoPlayer; // return un tableau associatif
        }
    }

// Method recupéré les attaquants

    public function listAttaquant()
    {

        $listAttaquant = $this->db->query("SELECT * FROM lamanage_users WHERE position_id = 1 or position_id = 2 or position_id = 3");
        $AttaquantList = $listAttaquant->fetchAll();
        return $AttaquantList;
    }

    // Method recupéré les milieux
    public function listMilieu()
    {

        $listMilieu = $this->db->query("SELECT * FROM lamanage_users WHERE position_id = 4 or position_id = 5 or position_id = 6");
        $MilieuList = $listMilieu->fetchAll();
        return $MilieuList;
    }
    // Method recupéré les defenseurs
    public function listDefenseur()
    {

        $listDefenseur = $this->db->query("SELECT * FROM lamanage_users WHERE position_id = 7 or position_id = 8 or position_id = 9");
        $DefenseurList = $listDefenseur->fetchAll();
        return $DefenseurList;
    }
    // Method recupéré les gardien de buts
    public function listGoal()
    {

        $listGoal = $this->db->query("SELECT * FROM lamanage_users WHERE position_id = 10");
        $GoalList = $listGoal->fetchAll();
        return $GoalList;
    }
// Method recupéré les remplacants
    public function listRemplacant()
    {

        $listRemplacant = $this->db->query("SELECT * FROM lamanage_users WHERE position_id = 11");
        $RemplacantList = $listRemplacant->fetchAll();
        return $RemplacantList;
    }
// Method pour trier les joueur par nbr de but
    public function BestGoal()
    {
        $listPlayer = $this->db->query("SELECT * FROM lamanage_users
        INNER JOIN lamanage_position ON lamanage_users.position_id = lamanage_position.position_id
        INNER JOIN lamanage_stats ON lamanage_users.users_id = lamanage_stats.users_id ORDER BY stats_goal DESC
        ");
        $PlayerList = $listPlayer->fetchAll();
        return $PlayerList;
    }
    // Method pour trier les joueur par nbr de passes
    public function BestAssist()
    {
        $listPlayer = $this->db->query("SELECT * FROM lamanage_users
        INNER JOIN lamanage_position ON lamanage_users.position_id = lamanage_position.position_id
        INNER JOIN lamanage_stats ON lamanage_users.users_id = lamanage_stats.users_id ORDER BY stats_assist DESC
        ");
        $PlayerList = $listPlayer->fetchAll();
        return $PlayerList;
    }
}
