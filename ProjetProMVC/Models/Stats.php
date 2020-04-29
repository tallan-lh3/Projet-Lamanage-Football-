<?php
class Stats extends Database
{

    private $stats_id;
    private $stats_goal;
    private $stats_assist;
    private $stats_game;
    private $users_id;

    /**
     * Get the value of stats_id
     */
    public function getStats_id()
    {
        return $this->stats_id;
    }

    /**
     * Set the value of stats_id
     *
     * @return  self
     */
    public function setStats_id($stats_id)
    {
        $this->stats_id = $stats_id;

        return $this;
    }

    /**
     * Get the value of stats_goal
     */
    public function getStats_goal()
    {
        return $this->stats_goal;
    }

    /**
     * Set the value of stats_goal
     *
     * @return  self
     */
    public function setStats_goal($stats_goal)
    {
        $this->stats_goal = $stats_goal;

        return $this;
    }

    /**
     * Get the value of stats_assist
     */
    public function getStats_assist()
    {
        return $this->stats_assist;
    }

    /**
     * Set the value of stats_assist
     *
     * @return  self
     */
    public function setStats_assist($stats_assist)
    {
        $this->stats_assist = $stats_assist;

        return $this;
    }

    /**
     * Get the value of stats_game
     */
    public function getStats_game()
    {
        return $this->stats_game;
    }

    /**
     * Set the value of stats_game
     *
     * @return  self
     */
    public function setStats_game($stats_game)
    {
        $this->stats_game = $stats_game;

        return $this;
    }

    /**
     * Get the value of users_id
     */
    public function getUsers_id()
    {
        return $this->users_id;
    }

    /**
     * Set the value of users_id
     *
     * @return  self
     */
    public function setUsers_id($users_id)
    {
        $this->users_id = $users_id;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
    }
// Method pour créé des stats (voir CreatePlayerController)
    public function createStats()
    {

        $pdoQuery = "INSERT INTO lamanage_stats (users_id) VALUES (:users_id)";
        $pdoResult = $this->db->prepare($pdoQuery);
        $pdoResult->bindValue(':users_id', $this->getUsers_id(), PDO::PARAM_INT);

        if ($pdoResult->execute()) {
            return true;
        } else {
            return false;
        }

    }
// Method pour edit les stats (voir edit_playerController)
    public function editStats()
    {
        $EditPlayer = $this->db->prepare("UPDATE lamanage_stats SET stats_game = :game, stats_goal = :goal, stats_assist = :assist WHERE users_id = :id");

        $EditPlayer->bindValue(':id', $this->getUsers_id(), PDO::PARAM_INT);
        $EditPlayer->bindValue(':game', $this->getStats_game(), PDO::PARAM_STR);
        $EditPlayer->bindValue(':goal', $this->getStats_goal(), PDO::PARAM_STR);
        $EditPlayer->bindValue(':assist', $this->getStats_assist(), PDO::PARAM_STR);

        if ($EditPlayer->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
