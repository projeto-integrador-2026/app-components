<?php

namespace app\helpers;

class Validator
{
    private array $errors = [];

    /**
     * Valida se um campo não está vazio
     */
    public function required(string $field, mixed $value, ?string $message = null): self
    {
        if (empty($value) && $value !== '0') {
            $this->errors[$field] = $message ?? "O campo {$field} é obrigatório";
        }
        return $this;
    }

    /**
     * Valida formato de email
     */
    public function email(string $field, string $value, ?string $message = null): self
    {
        if (!empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $message ?? "Email inválido";
        }
        return $this;
    }

    /**
     * Valida comprimento mínimo
     */
    public function minLength(string $field, string $value, int $min, ?string $message = null): self
    {
        if (!empty($value) && strlen($value) < $min) {
            $this->errors[$field] = $message ?? "O campo {$field} deve ter no mínimo {$min} caracteres";
        }
        return $this;
    }

    /**
     * Valida comprimento máximo
     */
    public function maxLength(string $field, string $value, int $max, ?string $message = null): self
    {
        if (!empty($value) && strlen($value) > $max) {
            $this->errors[$field] = $message ?? "O campo {$field} deve ter no máximo {$max} caracteres";
        }
        return $this;
    }

    /**
     * Valida se dois campos são iguais
     */
    public function matches(string $field, string $value, string $compareValue, ?string $message = null): self
    {
        if ($value !== $compareValue) {
            $this->errors[$field] = $message ?? "Os campos não conferem";
        }
        return $this;
    }

    /**
     * Valida complexidade de senha (maiúscula, minúscula e número)
     */
    public function passwordStrength(string $field, string $value, ?string $message = null): self
    {
        if (empty($value)) {
            return $this;
        }

        $hasUpperCase = preg_match('/[A-Z]/', $value);
        $hasLowerCase = preg_match('/[a-z]/', $value);
        $hasNumber = preg_match('/[0-9]/', $value);

        if (!$hasUpperCase || !$hasLowerCase || !$hasNumber) {
            $this->errors[$field] = $message ?? "A senha deve conter letras maiúsculas, minúsculas e números";
        }

        return $this;
    }

    /**
     * Valida padrão regex customizado
     */
    public function pattern(string $field, string $value, string $pattern, string $message): self
    {
        if (!empty($value) && !preg_match($pattern, $value)) {
            $this->errors[$field] = $message;
        }
        return $this;
    }

    /**
     * Valida se o valor está em uma lista de opções
     */
    public function in(string $field, mixed $value, array $options, ?string $message = null): self
    {
        if (!empty($value) && !in_array($value, $options, true)) {
            $this->errors[$field] = $message ?? "Valor inválido para o campo {$field}";
        }
        return $this;
    }

    /**
     * Sanitiza string removendo tags HTML e espaços extras
     */
    public static function sanitize(string $value): string
    {
        return trim(strip_tags($value));
    }

    /**
     * Sanitiza email
     */
    public static function sanitizeEmail(string $email): string
    {
        return strtolower(trim(filter_var($email, FILTER_SANITIZE_EMAIL)));
    }

    /**
     * Verifica se há erros
     */
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    /**
     * Retorna todos os erros
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Retorna o primeiro erro
     */
    public function getFirstError(): ?string
    {
        return !empty($this->errors) ? reset($this->errors) : null;
    }

    /**
     * Limpa os erros
     */
    public function clear(): self
    {
        $this->errors = [];
        return $this;
    }
}
