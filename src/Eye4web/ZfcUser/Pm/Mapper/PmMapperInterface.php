<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Eye4web\ZfcUser\Pm\Mapper;

use Eye4web\ZfcUser\Pm\Entity\ConversationInterface;
use Eye4web\ZfcUser\Pm\Entity\ConversationReceiverInterface;
use Eye4web\ZfcUser\Pm\Entity\MessageInterface;
use ZfcUserMod\Entity\UserInterface;

interface PmMapperInterface
{
    /**
     * Get's undeleted receives(deleted = false) for a user
     * @param  string $userId
     * @return ConversationReceiverInterface[]
     */
    public function getUserReceives($userId);

    /**
     * @param  ConversationInterface $conversation
     * @return MessageInterface[]
     */
    public function getMessages(ConversationInterface $conversation);

    /**
     * @param  ConversationInterface $conversation
     * @param  UserInterface         $user
     * @return mixed
     */
    public function markRead(ConversationInterface $conversation, UserInterface $user);

    /**
     * Note: This method doesn't delete from the database,
     * but sets a deleted flag on the ConversationReceiver entity
     * @param  string         $conversationsId
     * @param  UserInterface $user
     * @return void
     */
    public function deleteConversation($conversationsId, UserInterface $user);

    /**
     * @return UserInterface[]
     */
    public function getUsers();

    /**
     * @param  string $conversationId
     * @return ConversationInterface
     */
    public function getConversation($conversationId);

    /**
     * @param  ConversationInterface $conversation
     * @return ConversationReceiverInterface[]
     */
    public function getReceiversByConversation(ConversationInterface $conversation);

    /**
     * @param ConversationReceiverInterface $conversation
     */
    public function markUnread(ConversationReceiverInterface $conversationReceiver);

    /**
     * @param  ConversationInterface $conversation
     * @param  UserInterface         $user
     * @return bool
     */
    public function isUnread(ConversationInterface $conversation, UserInterface $user);

    /**
     * @param  ConversationInterface $conversation
     * @return ConversationInterface
     */
    public function newConversation(ConversationInterface $conversation);

    /**
     * @param  MessageInterface $message
     * @return MessageInterface
     */
    public function newMessage(MessageInterface $message);

    /**
     * @param  ConversationInterface $conversation
     * @return MessageInterface
     */
    public function getLastReply(ConversationInterface $conversation);

    /**
     * Get's unread, undeleted conversation receives(deleted = false)
     * @param  UserInterface $user
     * @return ConversationReceiverInterface[]
     */
    public function getUnreadConversationReceivers(UserInterface $user);

    /**
     * @param string $userId
     * @return UserInterface
     */
    public function getUser($userId);

    /**
     * @param ConversationReceiverInterface $receiver
     * @return ConversationReceiverInterface
     */
    public function addReceiver(ConversationReceiverInterface $receiver);
}
