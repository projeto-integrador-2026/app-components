<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Admin • Editar Jogador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background-color: #212529;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar .active {
            color: #fff;
            background-color: #343a40;
        }

        .content {
            padding: 20px;
        }

        .current-photo {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #dee2e6;
        }
    </style>
</head>

<body>

    <!-- CONTEÚDO -->
    <main class="flex-fill content">

        <!-- TÍTULO + VOLTAR -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Editar Jogador</h2>
            <a href="<?= BASE_URL ?>/adm/players" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <!-- CARD COM FORMULÁRIO -->
        <div class="card shadow-sm">
            <div class="card-body p-4">

                <form action="<?= BASE_URL ?>/adm/players/update/<?= $player->getId() ?>" method="post" enctype="multipart/form-data">

                    <div class="row g-3">
                        <!-- Nome -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?= htmlspecialchars($player->getName()) ?>" required>
                        </div>

                        <!-- Data de Nascimento -->
                        <div class="col-md-6">
                            <label for="birthDate" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="birthDate" name="birthDate"
                                value="<?= $player->getBirthDate()->format('Y-m-d') ?>" required>
                        </div>

                        <!-- Nacionalidade -->
                        <div class="col-md-6">
                            <label for="nationality" class="form-label">Nacionalidade</label>
                            <input type="text" class="form-control" id="nationality" name="nationality"
                                value="<?= htmlspecialchars($player->getNationality()) ?>" required>
                        </div>

                        <!-- Posição -->
                        <div class="col-md-6">
                            <label for="position" class="form-label">Posição</label>
                            <select class="form-select" id="position" name="position">
                                <?php foreach (['Goalkeeper', 'Defender', 'Midfielder', 'Forward'] as $pos): ?>
                                    <option value="<?= $pos ?>" <?= $player->getPosition()->value == $pos ? 'selected' : '' ?>><?= $pos ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Altura -->
                        <div class="col-md-4">
                            <label for="height" class="form-label">Altura (m)</label>
                            <input type="number" step="0.01" class="form-control" id="height" name="height"
                                value="<?= $player->getHeight() ?>" required>
                        </div>

                        <!-- Peso -->
                        <div class="col-md-4">
                            <label for="weight" class="form-label">Peso (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="weight" name="weight"
                                value="<?= $player->getWeight() ?>" required>
                        </div>

                        <!-- Pé Dominante -->
                        <div class="col-md-4">
                            <label for="dominantFoot" class="form-label">Pé Dominante</label>
                            <input type="text" class="form-control" id="dominantFoot" name="dominantFoot"
                                value="<?= htmlspecialchars($player->getDominantFoot()) ?>" required>
                        </div>

                        <!-- Time -->
                        <div class="col-md-6">
                            <label for="team" class="form-label">Time (País)</label>
                            <input type="text" class="form-control" id="team" name="team"
                                value="<?= htmlspecialchars($player->getTeam()->getCountry()) ?>" required>
                        </div>

                        <!-- Foto -->
                        <div class="col-md-6">
                            <label for="image" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <!-- Foto Atual -->
                        <?php if ($player->getImage()): ?>
                            <div class="col-12">
                                <label class="form-label text-muted">Foto atual</label>
                                <div>
                                    <img src="<?= BASE_URL ?>/<?= $player->getImage() ?>"
                                        alt="Foto do Jogador"
                                        class="current-photo">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Botão Atualizar -->
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle"></i> Atualizar
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>