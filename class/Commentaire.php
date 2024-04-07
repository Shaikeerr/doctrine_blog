<?php 

/** @Entity @Table(name="commentaires") **/
class Commentaire {
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    /** @Texte @Column(type="string", length=2000) **/
    public $texte;

    /**
     * @ManyToOne(targetEntity="Utilisateur") 
     * @JoinColumn(nullable=false)
     */
    public $utilisateur;

    /**
     * @ManyToOne(targetEntity="Message")
     * @JoinColumn(nullable=false)
     */
    public $message;

     /**
     * Get id.
     *
     * @return int
     */

    /** @Date @Column(type="datetime"), nullable=true **/
    public $datepost = null;
     

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set texte.
     *
     * @param string $texte
     *
     * @return Commentaire
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte.
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set datepost.
     *
     * @param \DateTime $datepost
     *
     * @return Commentaire
     */
    public function setDatepost($datepost)
    {
        $this->datepost = $datepost;

        return $this;
    }

    /**
     * Get datepost.
     *
     * @return \DateTime
     */
    public function getDatepost()
    {
        return $this->datepost;
    }

    /**
     * Set titre.
     *
     * @param string $titre
     *
     * @return Commentaire
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
     * Set utilisateur.
     *
     * @param \Utilisateur $utilisateur
     *
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

    /**
     * Set message.
     *
     * @param \Message $message
     *
     * @return Commentaire
     */
    public function setMessage(\Message $message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message.
     *
     * @return \Message
     */
    public function getMessage()
    {
        return $this->message;
    }
}


?>