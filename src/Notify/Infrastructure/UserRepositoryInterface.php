<?php

namespace JLaso\Notify\Infrastructure;

interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * @param string $id
     * @return UserInterface
     */
    public function find($id);

    /**
     * @return UserInterface[]
     */
    public function findAll();

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function save(UserInterface $user);

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function update(UserInterface $user);

}