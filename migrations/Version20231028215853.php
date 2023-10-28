<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231028215853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annee (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, date_debut INT NOT NULL, date_fin INT NOT NULL, autre_info VARCHAR(255) NOT NULL, etat INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appartement (id INT AUTO_INCREMENT NOT NULL, maisson_id INT DEFAULT NULL, lib_appart VARCHAR(255) NOT NULL, nbre_pieces INT NOT NULL, num_etage INT NOT NULL, loyer INT NOT NULL, caution INT NOT NULL, details VARCHAR(255) NOT NULL, oqp INT NOT NULL, INDEX IDX_71A6BD8D4A820096 (maisson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE campagne (id INT AUTO_INCREMENT NOT NULL, annee_id INT DEFAULT NULL, mois_id INT DEFAULT NULL, lib_campagne VARCHAR(255) NOT NULL, nbre_proprio INT NOT NULL, nbre_locataire INT NOT NULL, mnt_total INT NOT NULL, mnt_paye VARCHAR(255) NOT NULL, INDEX IDX_539B5D16543EC5F0 (annee_id), INDEX IDX_539B5D16FA0749B8 (mois_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte_loc (id INT AUTO_INCREMENT NOT NULL, locataire_id INT DEFAULT NULL, contrat_id INT DEFAULT NULL, mnt_caution INT NOT NULL, mnt_avance INT NOT NULL, mnt_frais_anex INT NOT NULL, date_limite INT NOT NULL, solde INT NOT NULL, mnt_verse INT NOT NULL, mnt_apayer INT NOT NULL, INDEX IDX_D81A21E1D8A38199 (locataire_id), INDEX IDX_D81A21E11823061F (contrat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE config_app (id INT AUTO_INCREMENT NOT NULL, logo_id INT DEFAULT NULL, favicon_id INT DEFAULT NULL, image_login_id INT DEFAULT NULL, logo_login_id INT DEFAULT NULL, nom_entreprise VARCHAR(255) NOT NULL, main_color_admin VARCHAR(255) NOT NULL, default_color_admin VARCHAR(255) NOT NULL, main_color_login VARCHAR(255) NOT NULL, default_color_login VARCHAR(255) NOT NULL, INDEX IDX_D62F11C0F98F144A (logo_id), INDEX IDX_D62F11C0D78119FD (favicon_id), INDEX IDX_D62F11C0D3426EF5 (image_login_id), INDEX IDX_D62F11C0C83BB8B (logo_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contratloc (id INT AUTO_INCREMENT NOT NULL, locataire_id INT DEFAULT NULL, appartement_id INT DEFAULT NULL, regime_id INT DEFAULT NULL, nature_id INT DEFAULT NULL, date_debut INT NOT NULL, date_fin INT NOT NULL, nb_mois_caution INT NOT NULL, mnt_caution INT NOT NULL, nb_mois_avance INT NOT NULL, mnt_avance INT NOT NULL, mnt_loyer INT NOT NULL, autre_infos VARCHAR(255) NOT NULL, scan_contrat VARCHAR(255) NOT NULL, date_entree INT NOT NULL, date_proch_vers INT NOT NULL, mnt_loyer_prec INT NOT NULL, mnt_loyer_ini INT NOT NULL, mnt_loyer_actu INT NOT NULL, mnt_arriere INT NOT NULL, deja_locataire VARCHAR(255) NOT NULL, statut_loc VARCHAR(255) NOT NULL, fraisanex INT NOT NULL, etat INT NOT NULL, tot_verse INT NOT NULL, INDEX IDX_F6306FF3D8A38199 (locataire_id), INDEX IDX_F6306FF3E1729BBA (appartement_id), INDEX IDX_F6306FF335E7D534 (regime_id), INDEX IDX_F6306FF33BCB2E4B (nature_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cptproprio (id INT AUTO_INCREMENT NOT NULL, proprio_id INT DEFAULT NULL, pourcentage INT NOT NULL, total_du INT NOT NULL, total_paye INT NOT NULL, INDEX IDX_E57BA7426B82600 (proprio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depenses (id INT AUTO_INCREMENT NOT NULL, lib_depense VARCHAR(255) NOT NULL, montant_ttc INT NOT NULL, date VARCHAR(255) NOT NULL, details LONGTEXT NOT NULL, scan VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editable (id INT AUTO_INCREMENT NOT NULL, registered INT NOT NULL, code VARCHAR(255) NOT NULL, html LONGTEXT NOT NULL, deletable INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe (id INT AUTO_INCREMENT NOT NULL, fonction_id INT NOT NULL, civilite_id INT NOT NULL, service_id INT DEFAULT NULL, nom VARCHAR(25) NOT NULL, prenom VARCHAR(100) NOT NULL, contact VARCHAR(50) NOT NULL, adresse_mail VARCHAR(255) NOT NULL, matricule VARCHAR(12) NOT NULL, INDEX IDX_F804D3B957889920 (fonction_id), INDEX IDX_F804D3B939194ABF (civilite_id), INDEX IDX_F804D3B9ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factureloc (id INT AUTO_INCREMENT NOT NULL, compagne_id INT DEFAULT NULL, mois_id INT DEFAULT NULL, contrat_id INT DEFAULT NULL, locataire_id INT DEFAULT NULL, appartement_id INT DEFAULT NULL, lib_facture VARCHAR(255) NOT NULL, mnt_fact INT NOT NULL, solde_fact_loc INT NOT NULL, date_emission INT NOT NULL, date_limite INT NOT NULL, INDEX IDX_913E87E48EB43C7 (compagne_id), INDEX IDX_913E87E4FA0749B8 (mois_id), INDEX IDX_913E87E41823061F (contrat_id), INDEX IDX_913E87E4D8A38199 (locataire_id), INDEX IDX_913E87E4E1729BBA (appartement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factures_fournisseurs (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT DEFAULT NULL, date INT NOT NULL, montant INT NOT NULL, etat INT NOT NULL, objet INT NOT NULL, mt_paye INT NOT NULL, solde INT NOT NULL, details LONGTEXT NOT NULL, INDEX IDX_3DC2C1FD670C757F (fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fincontrat (id INT AUTO_INCREMENT NOT NULL, contrat_id INT DEFAULT NULL, motif_id INT DEFAULT NULL, date_fin INT NOT NULL, details LONGTEXT NOT NULL, fichier VARCHAR(255) NOT NULL, caution_remise INT NOT NULL, INDEX IDX_F78ADFDA1823061F (contrat_id), INDEX IDX_F78ADFDAD0EEB819 (motif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseurs (id INT AUTO_INCREMENT NOT NULL, raisoc VARCHAR(255) NOT NULL, contacts VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_module (id INT AUTO_INCREMENT NOT NULL, icon_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, ordre INT NOT NULL, lien VARCHAR(255) NOT NULL, INDEX IDX_671ADA1254B9D732 (icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE icon (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_depense (id INT AUTO_INCREMENT NOT NULL, depenses_id INT DEFAULT NULL, montant INT NOT NULL, INDEX IDX_AB9CA96E338B55D2 (depenses_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locataire (id INT AUTO_INCREMENT NOT NULL, situation_matri_id INT DEFAULT NULL, nprenoms VARCHAR(255) NOT NULL, date_naiss VARCHAR(255) NOT NULL, lieu_naiss VARCHAR(255) NOT NULL, info_piece VARCHAR(255) NOT NULL, scan_piece VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, ethnie VARCHAR(255) NOT NULL, nb_enfts VARCHAR(255) NOT NULL, nb_pers_chge VARCHAR(255) NOT NULL, pere VARCHAR(255) NOT NULL, mere VARCHAR(255) NOT NULL, contacts VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, npconjointe VARCHAR(255) NOT NULL, prof_conj VARCHAR(255) NOT NULL, ethnie_conj VARCHAR(255) NOT NULL, contact_conj VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, vivez_avec VARCHAR(255) NOT NULL, INDEX IDX_C47CF6EBBD0792AB (situation_matri_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maison (id INT AUTO_INCREMENT NOT NULL, quartier_id INT DEFAULT NULL, proprio_id INT DEFAULT NULL, typemaison_id INT DEFAULT NULL, lib_maison VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, lot VARCHAR(255) NOT NULL, ilot VARCHAR(255) NOT NULL, tfoncier VARCHAR(255) NOT NULL, mnt_com INT NOT NULL, id_agent INT NOT NULL, INDEX IDX_F90CB66DDF1E57AB (quartier_id), INDEX IDX_F90CB66D6B82600 (proprio_id), INDEX IDX_F90CB66D7E58BA33 (typemaison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module_groupe_permition (id INT AUTO_INCREMENT NOT NULL, permition_id INT DEFAULT NULL, module_id INT DEFAULT NULL, groupe_module_id INT DEFAULT NULL, groupe_user_id INT DEFAULT NULL, ordre INT NOT NULL, ordre_groupe INT NOT NULL, menu_principal TINYINT(1) NOT NULL, INDEX IDX_632E4EE3806F2303 (permition_id), INDEX IDX_632E4EE3AFC2B591 (module_id), INDEX IDX_632E4EE3FF5666A6 (groupe_module_id), INDEX IDX_632E4EE3610934DB (groupe_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motif (id INT AUTO_INCREMENT NOT NULL, lib_motif VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nationalite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, observations VARCHAR(255) NOT NULL, abrege VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nature (id INT AUTO_INCREMENT NOT NULL, lib_nature VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE param_civilite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(15) NOT NULL, code VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE param_fichier (id INT AUTO_INCREMENT NOT NULL, size INT NOT NULL, path VARCHAR(255) NOT NULL, alt VARCHAR(255) NOT NULL, date DATETIME NOT NULL, url VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE param_fonction (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(150) NOT NULL, code VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_544A947977153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE param_service (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permition (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprio (id INT AUTO_INCREMENT NOT NULL, nom_prenoms VARCHAR(255) NOT NULL, contacts VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, num_cni VARCHAR(255) NOT NULL, cni VARCHAR(255) NOT NULL, nom_pere VARCHAR(255) NOT NULL, nom_mere VARCHAR(255) NOT NULL, whats_app VARCHAR(255) NOT NULL, datenaiss VARCHAR(255) NOT NULL, lieu_naiss VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, date_cni VARCHAR(255) NOT NULL, nom_prenoms_r VARCHAR(255) NOT NULL, contacts_r VARCHAR(255) NOT NULL, email_r VARCHAR(255) NOT NULL, adresse_r VARCHAR(255) NOT NULL, num_cni_r VARCHAR(255) NOT NULL, nom_pere_r VARCHAR(255) NOT NULL, nom_mere_r VARCHAR(255) NOT NULL, whats_app_r VARCHAR(255) NOT NULL, datenaiss_r VARCHAR(255) NOT NULL, profession_r VARCHAR(255) NOT NULL, date_cni_r VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, commission DOUBLE PRECISION NOT NULL, total_du INT NOT NULL, total_paye INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quartier (id INT AUTO_INCREMENT NOT NULL, lib_quartier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regime (id INT AUTO_INCREMENT NOT NULL, lib_regime VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglements (id INT AUTO_INCREMENT NOT NULL, num_fact_id INT DEFAULT NULL, fournisseur_id INT DEFAULT NULL, typeversement_id INT DEFAULT NULL, montant_verse INT NOT NULL, date INT NOT NULL, numchq VARCHAR(255) NOT NULL, INDEX IDX_648F2671D06E46C3 (num_fact_id), INDEX IDX_648F2671670C757F (fournisseur_id), INDEX IDX_648F2671CE1BE80D (typeversement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubriques (id INT AUTO_INCREMENT NOT NULL, num_compte VARCHAR(255) NOT NULL, lib_rubrique VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sessions (id INT AUTO_INCREMENT NOT NULL, expire INT NOT NULL, donnees LONGTEXT NOT NULL, save VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sitmatri (id INT AUTO_INCREMENT NOT NULL, lib_situation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tabmois (id INT AUTO_INCREMENT NOT NULL, lib_mois VARCHAR(255) NOT NULL, num_mois INT NOT NULL, debut VARCHAR(255) NOT NULL, fin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_versements (id INT AUTO_INCREMENT NOT NULL, lib_type VARCHAR(255) NOT NULL, cod_typ VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typemaison (id INT AUTO_INCREMENT NOT NULL, lib_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_front_prestataire (id INT NOT NULL, denomination_sociale VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, contact_principal VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_front_utilisateur (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_AE2E610DF85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_front_utilisateur_simple (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenoms VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_groupe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_utilisateur (id INT AUTO_INCREMENT NOT NULL, employe_id INT NOT NULL, groupe_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, auth_code VARCHAR(180) DEFAULT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B407AA26F85E0677 (username), UNIQUE INDEX UNIQ_B407AA261B65292 (employe_id), INDEX IDX_B407AA267A45358C (groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE versmt_proprio (id INT AUTO_INCREMENT NOT NULL, proprio_id INT DEFAULT NULL, type_versement_id INT DEFAULT NULL, compte_proprio_id INT DEFAULT NULL, id_cpt_proprio INT NOT NULL, INDEX IDX_9EB3136B6B82600 (proprio_id), INDEX IDX_9EB3136B5CFC3767 (type_versement_id), INDEX IDX_9EB3136BCEACF9BE (compte_proprio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, lib_ville VARCHAR(255) NOT NULL, abrege_ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8D4A820096 FOREIGN KEY (maisson_id) REFERENCES maison (id)');
        $this->addSql('ALTER TABLE campagne ADD CONSTRAINT FK_539B5D16543EC5F0 FOREIGN KEY (annee_id) REFERENCES annee (id)');
        $this->addSql('ALTER TABLE campagne ADD CONSTRAINT FK_539B5D16FA0749B8 FOREIGN KEY (mois_id) REFERENCES tabmois (id)');
        $this->addSql('ALTER TABLE compte_loc ADD CONSTRAINT FK_D81A21E1D8A38199 FOREIGN KEY (locataire_id) REFERENCES locataire (id)');
        $this->addSql('ALTER TABLE compte_loc ADD CONSTRAINT FK_D81A21E11823061F FOREIGN KEY (contrat_id) REFERENCES contratloc (id)');
        $this->addSql('ALTER TABLE config_app ADD CONSTRAINT FK_D62F11C0F98F144A FOREIGN KEY (logo_id) REFERENCES param_fichier (id)');
        $this->addSql('ALTER TABLE config_app ADD CONSTRAINT FK_D62F11C0D78119FD FOREIGN KEY (favicon_id) REFERENCES param_fichier (id)');
        $this->addSql('ALTER TABLE config_app ADD CONSTRAINT FK_D62F11C0D3426EF5 FOREIGN KEY (image_login_id) REFERENCES param_fichier (id)');
        $this->addSql('ALTER TABLE config_app ADD CONSTRAINT FK_D62F11C0C83BB8B FOREIGN KEY (logo_login_id) REFERENCES param_fichier (id)');
        $this->addSql('ALTER TABLE contratloc ADD CONSTRAINT FK_F6306FF3D8A38199 FOREIGN KEY (locataire_id) REFERENCES locataire (id)');
        $this->addSql('ALTER TABLE contratloc ADD CONSTRAINT FK_F6306FF3E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE contratloc ADD CONSTRAINT FK_F6306FF335E7D534 FOREIGN KEY (regime_id) REFERENCES regime (id)');
        $this->addSql('ALTER TABLE contratloc ADD CONSTRAINT FK_F6306FF33BCB2E4B FOREIGN KEY (nature_id) REFERENCES nature (id)');
        $this->addSql('ALTER TABLE cptproprio ADD CONSTRAINT FK_E57BA7426B82600 FOREIGN KEY (proprio_id) REFERENCES proprio (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B957889920 FOREIGN KEY (fonction_id) REFERENCES param_fonction (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B939194ABF FOREIGN KEY (civilite_id) REFERENCES param_civilite (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B9ED5CA9E6 FOREIGN KEY (service_id) REFERENCES param_service (id)');
        $this->addSql('ALTER TABLE factureloc ADD CONSTRAINT FK_913E87E48EB43C7 FOREIGN KEY (compagne_id) REFERENCES campagne (id)');
        $this->addSql('ALTER TABLE factureloc ADD CONSTRAINT FK_913E87E4FA0749B8 FOREIGN KEY (mois_id) REFERENCES tabmois (id)');
        $this->addSql('ALTER TABLE factureloc ADD CONSTRAINT FK_913E87E41823061F FOREIGN KEY (contrat_id) REFERENCES contratloc (id)');
        $this->addSql('ALTER TABLE factureloc ADD CONSTRAINT FK_913E87E4D8A38199 FOREIGN KEY (locataire_id) REFERENCES locataire (id)');
        $this->addSql('ALTER TABLE factureloc ADD CONSTRAINT FK_913E87E4E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE factures_fournisseurs ADD CONSTRAINT FK_3DC2C1FD670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseurs (id)');
        $this->addSql('ALTER TABLE fincontrat ADD CONSTRAINT FK_F78ADFDA1823061F FOREIGN KEY (contrat_id) REFERENCES contratloc (id)');
        $this->addSql('ALTER TABLE fincontrat ADD CONSTRAINT FK_F78ADFDAD0EEB819 FOREIGN KEY (motif_id) REFERENCES motif (id)');
        $this->addSql('ALTER TABLE groupe_module ADD CONSTRAINT FK_671ADA1254B9D732 FOREIGN KEY (icon_id) REFERENCES icon (id)');
        $this->addSql('ALTER TABLE ligne_depense ADD CONSTRAINT FK_AB9CA96E338B55D2 FOREIGN KEY (depenses_id) REFERENCES depenses (id)');
        $this->addSql('ALTER TABLE locataire ADD CONSTRAINT FK_C47CF6EBBD0792AB FOREIGN KEY (situation_matri_id) REFERENCES sitmatri (id)');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT FK_F90CB66DDF1E57AB FOREIGN KEY (quartier_id) REFERENCES quartier (id)');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT FK_F90CB66D6B82600 FOREIGN KEY (proprio_id) REFERENCES proprio (id)');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT FK_F90CB66D7E58BA33 FOREIGN KEY (typemaison_id) REFERENCES typemaison (id)');
        $this->addSql('ALTER TABLE module_groupe_permition ADD CONSTRAINT FK_632E4EE3806F2303 FOREIGN KEY (permition_id) REFERENCES permition (id)');
        $this->addSql('ALTER TABLE module_groupe_permition ADD CONSTRAINT FK_632E4EE3AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE module_groupe_permition ADD CONSTRAINT FK_632E4EE3FF5666A6 FOREIGN KEY (groupe_module_id) REFERENCES groupe_module (id)');
        $this->addSql('ALTER TABLE module_groupe_permition ADD CONSTRAINT FK_632E4EE3610934DB FOREIGN KEY (groupe_user_id) REFERENCES user_groupe (id)');
        $this->addSql('ALTER TABLE reglements ADD CONSTRAINT FK_648F2671D06E46C3 FOREIGN KEY (num_fact_id) REFERENCES factureloc (id)');
        $this->addSql('ALTER TABLE reglements ADD CONSTRAINT FK_648F2671670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseurs (id)');
        $this->addSql('ALTER TABLE reglements ADD CONSTRAINT FK_648F2671CE1BE80D FOREIGN KEY (typeversement_id) REFERENCES type_versements (id)');
        $this->addSql('ALTER TABLE user_front_prestataire ADD CONSTRAINT FK_D390663EBF396750 FOREIGN KEY (id) REFERENCES user_front_utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_front_utilisateur_simple ADD CONSTRAINT FK_497298EDBF396750 FOREIGN KEY (id) REFERENCES user_front_utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_utilisateur ADD CONSTRAINT FK_B407AA261B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE user_utilisateur ADD CONSTRAINT FK_B407AA267A45358C FOREIGN KEY (groupe_id) REFERENCES user_groupe (id)');
        $this->addSql('ALTER TABLE versmt_proprio ADD CONSTRAINT FK_9EB3136B6B82600 FOREIGN KEY (proprio_id) REFERENCES proprio (id)');
        $this->addSql('ALTER TABLE versmt_proprio ADD CONSTRAINT FK_9EB3136B5CFC3767 FOREIGN KEY (type_versement_id) REFERENCES type_versements (id)');
        $this->addSql('ALTER TABLE versmt_proprio ADD CONSTRAINT FK_9EB3136BCEACF9BE FOREIGN KEY (compte_proprio_id) REFERENCES cptproprio (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8D4A820096');
        $this->addSql('ALTER TABLE campagne DROP FOREIGN KEY FK_539B5D16543EC5F0');
        $this->addSql('ALTER TABLE campagne DROP FOREIGN KEY FK_539B5D16FA0749B8');
        $this->addSql('ALTER TABLE compte_loc DROP FOREIGN KEY FK_D81A21E1D8A38199');
        $this->addSql('ALTER TABLE compte_loc DROP FOREIGN KEY FK_D81A21E11823061F');
        $this->addSql('ALTER TABLE config_app DROP FOREIGN KEY FK_D62F11C0F98F144A');
        $this->addSql('ALTER TABLE config_app DROP FOREIGN KEY FK_D62F11C0D78119FD');
        $this->addSql('ALTER TABLE config_app DROP FOREIGN KEY FK_D62F11C0D3426EF5');
        $this->addSql('ALTER TABLE config_app DROP FOREIGN KEY FK_D62F11C0C83BB8B');
        $this->addSql('ALTER TABLE contratloc DROP FOREIGN KEY FK_F6306FF3D8A38199');
        $this->addSql('ALTER TABLE contratloc DROP FOREIGN KEY FK_F6306FF3E1729BBA');
        $this->addSql('ALTER TABLE contratloc DROP FOREIGN KEY FK_F6306FF335E7D534');
        $this->addSql('ALTER TABLE contratloc DROP FOREIGN KEY FK_F6306FF33BCB2E4B');
        $this->addSql('ALTER TABLE cptproprio DROP FOREIGN KEY FK_E57BA7426B82600');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B957889920');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B939194ABF');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B9ED5CA9E6');
        $this->addSql('ALTER TABLE factureloc DROP FOREIGN KEY FK_913E87E48EB43C7');
        $this->addSql('ALTER TABLE factureloc DROP FOREIGN KEY FK_913E87E4FA0749B8');
        $this->addSql('ALTER TABLE factureloc DROP FOREIGN KEY FK_913E87E41823061F');
        $this->addSql('ALTER TABLE factureloc DROP FOREIGN KEY FK_913E87E4D8A38199');
        $this->addSql('ALTER TABLE factureloc DROP FOREIGN KEY FK_913E87E4E1729BBA');
        $this->addSql('ALTER TABLE factures_fournisseurs DROP FOREIGN KEY FK_3DC2C1FD670C757F');
        $this->addSql('ALTER TABLE fincontrat DROP FOREIGN KEY FK_F78ADFDA1823061F');
        $this->addSql('ALTER TABLE fincontrat DROP FOREIGN KEY FK_F78ADFDAD0EEB819');
        $this->addSql('ALTER TABLE groupe_module DROP FOREIGN KEY FK_671ADA1254B9D732');
        $this->addSql('ALTER TABLE ligne_depense DROP FOREIGN KEY FK_AB9CA96E338B55D2');
        $this->addSql('ALTER TABLE locataire DROP FOREIGN KEY FK_C47CF6EBBD0792AB');
        $this->addSql('ALTER TABLE maison DROP FOREIGN KEY FK_F90CB66DDF1E57AB');
        $this->addSql('ALTER TABLE maison DROP FOREIGN KEY FK_F90CB66D6B82600');
        $this->addSql('ALTER TABLE maison DROP FOREIGN KEY FK_F90CB66D7E58BA33');
        $this->addSql('ALTER TABLE module_groupe_permition DROP FOREIGN KEY FK_632E4EE3806F2303');
        $this->addSql('ALTER TABLE module_groupe_permition DROP FOREIGN KEY FK_632E4EE3AFC2B591');
        $this->addSql('ALTER TABLE module_groupe_permition DROP FOREIGN KEY FK_632E4EE3FF5666A6');
        $this->addSql('ALTER TABLE module_groupe_permition DROP FOREIGN KEY FK_632E4EE3610934DB');
        $this->addSql('ALTER TABLE reglements DROP FOREIGN KEY FK_648F2671D06E46C3');
        $this->addSql('ALTER TABLE reglements DROP FOREIGN KEY FK_648F2671670C757F');
        $this->addSql('ALTER TABLE reglements DROP FOREIGN KEY FK_648F2671CE1BE80D');
        $this->addSql('ALTER TABLE user_front_prestataire DROP FOREIGN KEY FK_D390663EBF396750');
        $this->addSql('ALTER TABLE user_front_utilisateur_simple DROP FOREIGN KEY FK_497298EDBF396750');
        $this->addSql('ALTER TABLE user_utilisateur DROP FOREIGN KEY FK_B407AA261B65292');
        $this->addSql('ALTER TABLE user_utilisateur DROP FOREIGN KEY FK_B407AA267A45358C');
        $this->addSql('ALTER TABLE versmt_proprio DROP FOREIGN KEY FK_9EB3136B6B82600');
        $this->addSql('ALTER TABLE versmt_proprio DROP FOREIGN KEY FK_9EB3136B5CFC3767');
        $this->addSql('ALTER TABLE versmt_proprio DROP FOREIGN KEY FK_9EB3136BCEACF9BE');
        $this->addSql('DROP TABLE annee');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE campagne');
        $this->addSql('DROP TABLE compte_loc');
        $this->addSql('DROP TABLE config_app');
        $this->addSql('DROP TABLE contratloc');
        $this->addSql('DROP TABLE cptproprio');
        $this->addSql('DROP TABLE depenses');
        $this->addSql('DROP TABLE editable');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE factureloc');
        $this->addSql('DROP TABLE factures_fournisseurs');
        $this->addSql('DROP TABLE fincontrat');
        $this->addSql('DROP TABLE fournisseurs');
        $this->addSql('DROP TABLE groupe_module');
        $this->addSql('DROP TABLE icon');
        $this->addSql('DROP TABLE ligne_depense');
        $this->addSql('DROP TABLE locataire');
        $this->addSql('DROP TABLE maison');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE module_groupe_permition');
        $this->addSql('DROP TABLE motif');
        $this->addSql('DROP TABLE nationalite');
        $this->addSql('DROP TABLE nature');
        $this->addSql('DROP TABLE param_civilite');
        $this->addSql('DROP TABLE param_fichier');
        $this->addSql('DROP TABLE param_fonction');
        $this->addSql('DROP TABLE param_service');
        $this->addSql('DROP TABLE permition');
        $this->addSql('DROP TABLE proprio');
        $this->addSql('DROP TABLE quartier');
        $this->addSql('DROP TABLE regime');
        $this->addSql('DROP TABLE reglements');
        $this->addSql('DROP TABLE rubriques');
        $this->addSql('DROP TABLE sessions');
        $this->addSql('DROP TABLE sitmatri');
        $this->addSql('DROP TABLE tabmois');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE type_versements');
        $this->addSql('DROP TABLE typemaison');
        $this->addSql('DROP TABLE user_front_prestataire');
        $this->addSql('DROP TABLE user_front_utilisateur');
        $this->addSql('DROP TABLE user_front_utilisateur_simple');
        $this->addSql('DROP TABLE user_groupe');
        $this->addSql('DROP TABLE user_utilisateur');
        $this->addSql('DROP TABLE versmt_proprio');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
