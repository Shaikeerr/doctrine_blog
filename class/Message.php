<?php 

/** @Entity @Table(name="messages") **/
class Message {
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    /** @Texte @Column(type="string", length=2000) **/
    public $texte;
    /** @Date @Column(type="datetime"), nullable=true **/
    public $datepost = null;
    /** @Titre @Column(type="string", length=200) **/
    public $titre;

    public function getId()
    {
        return $this->id;
    }

    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    public function getTexte()
    {
        return $this->texte;
    }

    public function setDatepost($datepost)
    {
        $this->datepost = $datepost;

        return $this;
    }

    public function getDatepost()
    {
        return $this->datepost;
    }

    /**
     * @ManyToOne(targetEntity="Utilisateur") 
     * @JoinColumn(nullable=false)
     */
    public $utilisateur;


    /**
     * @ManyToOne(targetEntity="Commentaire")
     * @JoinColumn(nullable=true)
     */
    
    /**
     * Set utilisateur.
     *
     * @param Utilisateur $utilisateur
     *
     * @return Message
     */
    public function setUtilisateur(Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }
    /**
     * Get utilisateur.
     *
     * @return Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

     /**
     * Set titre.
     *
     * @param string $titre
     *
     * @return Message
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
}





?>