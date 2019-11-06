--
-- Estrutura da tabela `outgoing`
--

CREATE TABLE `outgoing` (
  `id_outgoin` int(11) NOT NULL,
  `outgoing` varchar(250) NOT NULL,
  `outdate` date NOT NULL,
  `rating` varchar(15) NOT NULL, 
   place int NOT NULL,
   user int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `place`
--

CREATE TABLE `place` (
  `id_place` int(11) NOT NULL,
  `place` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `salary` varchar(15) NOT NULL,
   user int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_cad`
--

CREATE TABLE `user_cad` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `income` varchar(15) NOT NULL,
  `user_u` varchar(60) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `outgoing`
--
ALTER TABLE `outgoing`
  ADD PRIMARY KEY (`id_outgoin`);

--
-- Índices para tabela `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id_place`);

--
-- Índices para tabela `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user_cad`
--
ALTER TABLE `user_cad`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `outgoing`
--
ALTER TABLE `outgoing`
  MODIFY `id_outgoin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `place`
--
ALTER TABLE `place`
  MODIFY `id_place` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user_cad`
--
ALTER TABLE `user_cad`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;


--
-- RELACIONAMENTOS
--

-- OUTGOING
ALTER TABLE outgoing
ADD CONSTRAINT fk_place
FOREIGN KEY (place) REFERENCES place(id_place);

ALTER TABLE outgoing
ADD CONSTRAINT fk_user
FOREIGN KEY (user) REFERENCES user_cad(id_user);

--
-- salary
--
ALTER TABLE salary
ADD CONSTRAINT fk_user_salary
FOREIGN KEY (user) REFERENCES user_cad(id_user);
