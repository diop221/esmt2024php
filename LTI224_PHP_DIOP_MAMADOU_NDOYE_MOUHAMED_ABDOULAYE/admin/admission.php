<?php
// Connexion à la base de données
require_once('../connexion_db/conn_db.php');

// Vérifiez si l'utilisateur est authentifié
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
    exit();
}

// Tableau statique des candidats et leurs notes
$candidates = [
    1=> [
        'prenom' => 'Marie',
        'nom' => 'ENILEA',
        'filiere' => 'LPTI2',
        'notes' => [
            ['epreuve' => 'Chimie', 'note' => 16],
            ['epreuve' => 'Informatique', 'note' => 18],
        ],
    ],
    2 => [
        'prenom' => 'Mamadou',
        'nom' => 'Diop',
        'filiere' => 'LPTI1',
        'notes' => [
            ['epreuve' => 'Mathématiques', 'note' => 15],
            ['epreuve' => 'Physique', 'note' => 19],
        ],
    ],
   
    3 => [
        'prenom' => 'MOUHAMED',
        'nom' => 'NDOYE',
        'filiere' => 'LPTI3',
        'notes' => [
            ['epreuve' => 'Anglais', 'note' => 12],
            ['epreuve' => 'Français', 'note' => 14],
        ],
    ],
    4 => [
        'prenom' => 'FATOU',
        'nom' => 'NORRIS',
        'filiere' => 'LMEN1',
        'notes' => [
            ['epreuve' => 'MERISE', 'note' => 12],
            ['epreuve' => 'MANAGEMENT', 'note' => 14],
        ],
    ],
    5 => [
        'prenom' => 'MARIE',
        'nom' => 'NDIAYE',
        'filiere' => 'INGC1',
        'notes' => [
            ['epreuve' => 'INFORMATIQUE', 'note' =>12],
            ['epreuve' => 'Français', 'note' => 12],
        ],
    ],
    6 => [
        'prenom' => 'BADOU',
        'nom' => 'SY',
        'filiere' => 'INGC2',
        'notes' => [
            ['epreuve' => 'INFORMATIQUE', 'note' => 11],
            ['epreuve' => 'Français', 'note' => 12],
        ],
    ],
    7 => [
        'prenom' => 'BINTOU',
        'nom' => 'SYLLA',
        'filiere' => 'MPSIS1',
        'notes' => [
            ['epreuve' => 'INFORMATIQUE', 'note' => 12],
            ['epreuve' => 'Français', 'note' => 10],
        ],
    ],
    
];

// Calculer les moyennes et les mentions
foreach ($candidates as $id => $candidate) {
    $totalNotes = 0;
    $numNotes = count($candidate['notes']);
    foreach ($candidate['notes'] as $note) {
        $totalNotes += $note['note'];
    }
    $moyenne = $numNotes > 0 ? $totalNotes / $numNotes : 0;
    $candidates[$id]['moyenne'] = $moyenne;
    
    if ($moyenne >= 16) {
        $mention = 'Très Bien';
    } elseif ($moyenne >= 14) {
        $mention = 'Bien';
    } elseif ($moyenne >= 12) {
        $mention = 'Assez Bien';
    } elseif ($moyenne >= 10) {
        $mention = 'Passable';
    } else {
        $mention = 'Insuffisant';
    }
    $candidates[$id]['mention'] = $mention;
}

// Trier les candidats par ordre de mérite (moyenne décroissante)
usort($candidates, function ($a, $b) {
    return $b['moyenne'] <=> $a['moyenne'];
});

// Regrouper les candidats par filière
$groupedCandidates = [];
foreach ($candidates as $candidate) {
    $groupedCandidates[$candidate['filiere']][] = $candidate;
}

$filiereOrder = [
    'LPTI1', 'LPTI2', 'LPTI3',
    'LMEN1', 'LMEN2', 'LMEN3',
    'INGC1', 'INGC2', 'INGC3',
    'ING-ELEC1', 'ING-ELEC2', 'ING-ELEC3',
    'MPSIS1', 'MPSIS2',
    'MMEN1', 'MMEN2',
    'M-ELEC1', 'M-ELEC2'
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lisadmin.css">
    <title>Résultats des ADMISSIONS</title>
</head>
<body>
    <div class="container">
        <h1>Résultats des ADMISSIONS</h1>
        <table>
            <thead>
                <tr>
                    <th>Rang</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Filière</th>
                    <th>Moyenne</th>
                    <th>Mention</th>
                </tr>
            </thead>
            <tbody>
                <?php $rang = 1; ?>
                <?php foreach ($filiereOrder as $filiere): ?>
                    <?php if (isset($groupedCandidates[$filiere])): ?>
                        <?php foreach ($groupedCandidates[$filiere] as $candidate): ?>
                            <tr>
                                <td><?php echo $rang++; ?></td>
                                <td><?php echo htmlspecialchars($candidate['prenom']); ?></td>
                                <td><?php echo htmlspecialchars($candidate['nom']); ?></td>
                                <td><?php echo htmlspecialchars($candidate['filiere']); ?></td>
                                <td><?php echo number_format($candidate['moyenne'], 2); ?></td>
                                <td><?php echo htmlspecialchars($candidate['mention']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
