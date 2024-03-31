<?php

/** @Entity **/
class Billet
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    /** @Column(type="text", length=3000) **/
    public $titre;
    /** @Column(type="text", length=3000) **/
    public $contenu;
    /** @Column(nullable=true, type="datetime") **/
    public $datetime;
    /**
     * @ManyToOne(targetEntity="Utilisateur")
     * @JoinColumn(name="id", referencedColumnName="id")
     */
    public $utilisateur;

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
     * Set titre.
     * 
     * @param string $titre
     * @return Billet
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre.
     * 
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu.
     * 
     * @param string $contenu
     * @return Billet
     */ 
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu.
     * 
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set datetime.
     * 
     * @param \DateTime $datetime
     * @return Billet
     */
    public function setDatetime(\DateTime $datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime.
     * 
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set utilisateur.
     * 
     * @param \Utilisateur $utilisateur
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
}