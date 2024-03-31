<?php 

/** @Entity **/
class Message 
{   /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="text") **/
    private $texte;
    /** @Column(nullable=true, type="datetime") **/
    private $datetime;

     /**
     * @ManyToOne(targetEntity="Utilisateur")
     * @JoinColumn(name="id", referencedColumnName="id")
     */
    public $utilisateur;

/**
     * Set utilisateur.
     *
     * @param \Utilisateur $utilisateur
     *
     * @return Billet
     */
    public function setUtilisateur(\Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur.
     *
     * @return \Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

// Getters 
public function getId() {
    return $this->id;
}

public function getTexte() {
    return $this->texte;
}

public function getDatetime() {
    return $this->datetime;
}

// Setters
public function setId($id) {
    $this->id = $id;
}
public function setTexte($texte) {
    $this->texte = $texte;
}

public function setDatetime($datetime) {
    $this->datetime = $datetime;
}

}
