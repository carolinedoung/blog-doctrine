<?php 

/** @Entity **/
class Utilisateur {
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="text") **/
    private $login;
    /**  @Column(type="text") **/
    private $passwd;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set login.
     *
     * @param string $login
     *
     * @return Utilisateur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login.
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set passwd.
     *
     * @param string $passwd
     *
     * @return Utilisateur
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }

    /**
     * Get passwd.
     *
     * @return string
     */
    public function getPasswd()
    {
        return $this->passwd;
    }
}
