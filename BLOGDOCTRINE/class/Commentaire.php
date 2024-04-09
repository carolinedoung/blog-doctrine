<?php 

/** @Entity **/
class Commentaire 
{   
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    /** @Column(type="text", length=3000) **/
    public $contenu;
    /** @Column(nullable=true, type="datetime") **/
    public $datetime;
    /**
     * @ManyToOne(targetEntity="Billet")
     * @JoinColumn(name="billet_id", referencedColumnName="id")
     */
    public $billet;
    /**
     * @ManyToOne(targetEntity="Utilisateur")
     * @JoinColumn(name="utilisateur_id", referencedColumnName="id")
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
     * Set contenu.
     * 
     * @param string $contenu
     * @return Commentaire
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
     * @return Commentaire
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
     * Set billet.
     * 
     * @param \Billet $billet
     * @return Commentaire
     */
    public function setBillet(\Billet $billet)
    {
        $this->billet = $billet;

        return $this;
    }

    /**
     * Get billet.
     * 
     * @return \Billet
     */
    public function getBillet()
    {
        return $this->billet;
    }

    /**
     * Set utilisateur.
     * 
     * @param \Utilisateur $utilisateur
     * @return Commentaire
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